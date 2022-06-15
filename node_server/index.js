const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const helmet = require('helmet');
const solanaWeb3 = require('@solana/web3.js');

const app = express();

require('dotenv').config();
const stream_nonce_match = process.env.stream_nonce;

// adding Helmet to enhance your API's security
app.use(helmet());

// using bodyParser to parse JSON bodies into JS objects
app.use(bodyParser.json());

// enabling CORS for all requests
app.use(cors());

app.get('/', (req, res) => {
    res.send('hello world');
});

const verfiy_transaction = (signature) => {
    return new Promise(async(resolve, reject) => {
        try {
            // Connect to cluster
            var connection = new solanaWeb3.Connection(
                solanaWeb3.clusterApiUrl('testnet'),
                'confirmed',
            );
            var response = await connection.getTransaction(signature);

            resolve(response);
        } catch (e) {
            reject(e);
        }
    });
}

app.post('/check_stream', async(req, res) => {
    try {
        var nonce = req.body.stream_nonce;
        var signature = req.body.signature;

        if (!signature) {
            throw new Error('Missing Signature!');
        }

        if (nonce === stream_nonce_match) {
            var response_data = await verfiy_transaction(signature);
            var data;

            if (response_data) {
                data = {
                    payment: 'verified'
                }
            } else {
                data = {
                    payment: 'failed'
                }
            }
            res.status(200).json(data);
        } else {
            res.status(401).json({
                message: "Unauthorized!"
            })
        }
    } catch (error) {
        res.status(500).json({
            message: error.message || "Something goes wrong!"
        })
    }
});


const port = process.env.PORT || 3000;

app.listen(port, () => console.log('listening on port ' + port));