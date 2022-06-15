<?php $dismissible = $dismissible ? ' is-dismissible' : ''; ?>
<div class="notice notice-<?php echo esc_attr($type); echo esc_attr($dismissible); ?>">
    <p><?php echo $notice; ?></p>
</div>