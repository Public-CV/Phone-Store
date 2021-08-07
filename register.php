<?php
    require_once './autoload/Autoload.php';

    if (Input::hasPost('register')) {
        $sql = "SELECT * FROM khachhang WHERE email='" . Input::post('email') . "'";
        $isSetEmail = $DB->query($sql);

        if (!is_array($isSetEmail)) {
            $created = $DB->create(
                'khachhang',
                [
                    'email' => Input::post('email'),
                    'password' => md5(Input::post('password')),
                    'avatar' => 'public/uploads/customer/employee-avatar.png',
                    'hoten' => Input::post('hoten'),
                    'phone' => Input::post('phone'),
                    'diachi' => "",
                    'note' => ""
                ]
            );
            Redirect::url("login.php");
        } else {
            $errorRegister = "Email đã tồn tại";
        }
    }

$title = "Đăng ký tài khoản thành viên";
require_once './layouts/page/header.php';
?>

<main id="register">
    <div class="container p-4">
        <form class="m-2 border p-4" method="POST">
            <h2 class="text-primary text-center mb-4">Đăng ký tài khoản thành viên</h2>
            <?php if (isset($errorRegister)) :?>
                <div class="bg-light p-2">
                    <h5 class="text-center text-danger"><?= $errorRegister ?></h5>
                </div>
            <? endif ?>
            <div class="input">
                <div class="m-3">
                    <label>Email *</label>
                    <input name="email" id="username" type="text">
                </div>
                <div class="m-3">
                    <label>Mật khẩu *</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="m-3">
                    <label>Họ tên *</label>
                    <input type="text" name="hoten" id="hoten">
                </div>
                <div class="m-3">
                    <label>Điện thoại *</label>
                    <input type="text" name="phone" id="phone">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary" type="submit" name="register">Đăng Kí</button>
                </div>
            </div>
        </form>
    </div>
</main>

<?php require_once './layouts/page/footer.php'; ?>
