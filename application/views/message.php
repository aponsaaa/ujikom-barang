<?php if ($this->session->flashdata('success')) { ?>
    <div class="alert alert-success" role="alert">
        <strong>Well done!</strong> <?= $this->session->flashdata('success'); ?></a>.
    </div>
<?php } else if ($this->session->flashdata('error')) { ?>
    <div class="alert alert-danger mb-0" role="alert">
        <strong>Oh snap!!</strong> <?= $this->session->flashdata('error'); ?></a>.
    </div>
<?php } ?>