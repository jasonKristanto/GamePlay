<div id="myModal" class="modal fade centered-modal">
    <div class="modal-dialog modal-dialogx">
        <div class="modal-content modal-contentx">
            <div class="modal-header darkBlue">
                <h4 class="modal-title text-center"><span style="color:white">Game<strong style="color:red">Play</strong> Admin</span></h4>
            </div>
            <form action='<?php echo base_url() . 'Admin/login'; ?>' method='post'>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name='username' class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name='password' class="form-control" placeholder="Password">
                    </div>
                    <span class='red'><?php if(isset($error)) echo $error;?></span>
                </div>
                <div class="modal-footer">
                

                    <button type="submit" class="btn btn-primary btnx">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.modal-backdrop{
    opacity:0.9 !important;
}
</style>

<script>
    $(document).ready(function(){
        $('#myModal').modal({
            keyboard: false,
            show: 
                <?php
                    if(!isset($login) || $login == false) echo "true"; //belom login
                    else echo "false"; //berhasil login
                ?>,
            backdrop: 'static'
        });
    });
</script>