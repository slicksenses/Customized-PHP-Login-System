<?php
 include_once 'layout/header.php';
$middleware= new Middleware();
$middleware->guard();
$model= new Model();

?>
        <a name="top"></a>
        <div class="android-be-together-section mdl-typography--text-center">
            <div class="logo-font android-slogan">Dashboard</div>
            <div class="logo-font android-sub-slogan">Welcome to php programming.</div>
            <div class="logo-font android-create-character">
                <a href=""><img src="<?= $config->asset('images/andy.png') ?>"> create your android character</a>
            </div>

            <a href="#screens">
                <button class="android-fab mdl-button mdl-button--colored mdl-js-button mdl-button--fab mdl-js-ripple-effect">
                    <i class="material-icons">expand_more</i>
                </button>
            </a>

        </div>
    <div class="android-more-section">
        <div class="logo-font android-sub-slogan">&nbsp; Users</div>
        <div class="android-card-container mdl-grid">
            <table class="mdl-data-table mdl-data-table__select">
                <thead>
                <tr>
                    <th width="50">#</th>
                    <th>Username</th>
                    <th>Registered At</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($model->getAll('users') as $key=>$user){ ?>
                <tr>
                    <td><?= $key+=1 ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['created_at'] ?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
include_once 'layout/footer.php';
?>