<!DOCTYPE html>
<html lang="fr" class="no-js">

    <?php 
        include 'head.php';
    ?>

	<body>

        <?php
            include 'navbar-map.php';
        ?>

        <div class="container-fluid">
            <div id="map-modification" style="width: 100%; height: 500px"></div>
        </div>

        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                         <h4 class="modal-title">T'as quoi connard ?</h4>

                    </div>
                    <div class="modal-body">
                        <p>Décris moi tes putains de symptomes</p>
                    </div>

                    <form>
                        <input type="checkbox"><label>Fièvre</label>
                        <input type="checkbox"><label>Mal au bras</label>

                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">J'ai fini</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <?php
            include 'foot.php';
        ?>
	</body>
</html>