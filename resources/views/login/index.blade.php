<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <title>Title</title>
    <link rel="stylesheet" href="css/element-ui.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .el-container {
            height: 100%;
            width: 100%;
        }

        .el-container .el-main {
            padding: 0;
            height: 100vh;
            background: linear-gradient(#4255f8, #2a82fe);
            display: flex;
            align-items: center;
        }

        .el-container .el-main .left {
            width: 55%;
        }

        .el-container .el-main .right {
            width: 45%;
        }

        .login-img {
            width: 64%;
            height: 320px;
            background-color: #fff;
            text-align: center;
            margin: 0 auto;
            display: flex;
        }

        .login-img img {
            width: auto;
            max-width: 100%;
            max-height: 280px;
            align-self: center;
            margin: 0 auto;
        }

        .form {
            width: 55%;
            height: 320px;
            text-align: center;
            margin: 0 auto;
            background-color: #fff;
        }

        .title {
            height: 60px;
            line-height: 60px;
            color: #409eff;
            font-size: 20px;
        }

        .el-form .el-form-item__content, .el-form .el-form-item__error {
            margin: 0 !important;
            padding: 0 40px 8px;
        }

        .el-button {
            width: 100%;
        }

        .el-footer {
            color: #333;
            text-align: center;
            line-height: 60px;
        }
    </style>
</head>
<body>
<div id="app">
    <el-container>
{{--        <el-header></el-header>--}}
        <el-main>
            <div class="left">
                <div class="login-img">
                    <img src="images/login.png" alt="">
                </div>
            </div>
            <div class="right">
                <div class="form">
                    <div class="title">登录</div>
                    <el-form :model="form" :rules="rules" ref="form" label-width="100px">
                        <el-form-item prop="username">
                            <el-input v-model="form.username" placeholder="用户名"></el-input>
                        </el-form-item>
                        <el-form-item prop="password">
                            <el-input v-model="form.password" placeholder="密码" show-password></el-input>
                        </el-form-item>
                        <el-form-item>
                            <el-button type="primary" @click="submitForm('form')">登录</el-button>
                        </el-form-item>
                    </el-form>
                </div>
            </div>
        </el-main>
{{--        <el-footer>--}}
{{--            Copyright 2014-2020 智网网络. All Rights Reserved--}}
{{--        </el-footer>--}}
    </el-container>
</div>
</body>
<script src="js/vue.js"></script>
<script src="js/element_ui.js"></script>
<script src="js/axios.min.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            form: {
                username: '',
                password: '',
            },
            rules: {
                username: [
                    {required: true, message: '请输入用户名', trigger: 'blur'},
                ],
                password: [
                    {required: true, message: '请输入密码', trigger: 'blur'},
                ],
            }
        },
        methods: {
            submitForm(form) {
                this.$refs[form].validate((valid) => {
                    if (valid) {
                        axios.post('/login', {
                            username: this.form.username,
                            password: this.form.password,
                            _token: "{{ csrf_token() }}"
                        }).then((response) => {
                            if (response.data.code !== 0) {
                                this.$message.error(response.data.message);
                            } else {
                                window.location.href = '/cert';
                            }
                        }).catch((error) => {
                            console.log(error);
                        })
                    }
                });
            },
        }
    })
</script>
</html>
