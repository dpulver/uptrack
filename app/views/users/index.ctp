<p>Hello, <?php echo($user['first_name'] . ' ' . $user['last_name']); ?></p>

<?php echo $html->link('knownusers', array('action' => 'knownusers')); ?>

<?php echo $html->link('logout', array('action' => 'logout')); ?>