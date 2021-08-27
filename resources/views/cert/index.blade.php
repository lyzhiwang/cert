<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- import CSS -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div id="app">
    <el-container>
        <el-header>
            <el-button type="info" icon="el-icon-switch-button" circle @click="logout"></el-button>
        </el-header>
        <el-main>
            <el-row>
                <el-col :span="12">
                    <div class="grid-content bg-purple">
                        <div id="cert">
                            <img id="bg" src="images/cert_bg.jpg" alt="">
                            <div id="main">
                                <div id="logo">
                                    <img :src="logo" alt="">
                                </div>
                                <div id="title">
                                    <img src="images/title.png" alt="">
                                </div>
                                <div id="content">
                                    <template v-if="form.project === 0">
                                        兹授权<span>&emsp;@{{ form.name }}&emsp;</span>为拓客来红包朋友圈口碑广告系统在<span>&emsp;@{{ form.area }}&emsp;</span>的独家代理。负责拓客来在当地的市场营销和推广工作。
                                    </template>
                                    <template v-if="form.project === 1">
                                        兹授权<span>&emsp;@{{ form.name }}&emsp;</span>为码上拓客红包朋友圈口碑广告系统在<span>&emsp;@{{ form.area }}&emsp;</span>的独家代理。负责码上拓客在当地的市场营销和推广工作。
                                    </template>
                                    <template v-if="form.project === 2">
                                        兹授权<span>&emsp;@{{ form.name }}&emsp;</span>为拓客多多红包拓客精准广告营销系统在<span>&emsp;@{{ form.area }}&emsp;</span>的独家代理。负责拓客多多在当地的市场营销和推广工作。
                                    </template>
                                    <template v-if="form.project === 3">
                                        兹授权<span>&emsp;@{{ form.name }}&emsp;</span>为扫码有钱微信红包营销系统的全国分销代理。负责扫码有钱全国市场营销和推广工作。
                                    </template>
                                    <template v-if="form.project === 4">
                                        兹授权<span>&emsp;@{{ form.name }}&emsp;</span>为获客大师小视频流量系统在<span>&emsp;@{{ form.area }}&emsp;</span>的授权合作商。负责获客大师在当地的市场营销和推广工作。
                                    </template>
                                    <template v-if="form.project === 5">
                                        兹授权<span>&emsp;@{{ form.name }}&emsp;</span>为门店拓客联盟广告营销系统在<span>&emsp;@{{ form.area }}&emsp;</span>的独家代理。负责门店拓客联盟在当地的市场营销和推广工作。
                                    </template>
                                </div>
                                <div id="date">
                                    <div>授权日期&nbsp;:&nbsp;<span>@{{ form.date }}</span></div>
                                    <div>
                                        授权编号&nbsp;:&nbsp;<span>ZW@{{ form.areaInitial }}@{{ projects[form.project].en }}@{{  formatDate }}</span>
                                    </div>
                                </div>
                                <div id="remark">
                                    <div class="left">备注&nbsp;:&nbsp;</div>
                                    <div class="right">
                                        {{--                                        <div>本授权以正本为有效文本、不得彩印、涂改、转让。洛阳智网网络科技有限公司拥有此授权书的最终解释权。</div>--}}
                                        <div>本授权以正本为有效文本、不得彩印、涂改、转让。</div>
                                        <div>洛阳智网网络科技有限公司拥有此授权书的最终解释权。</div>
                                    </div>
                                </div>
                                <div id="company">授权单位&nbsp;:&nbsp;洛阳智网网络科技有限公司</div>
                            </div>
                        </div>
                    </div>
                </el-col>
                <el-col :span="12">
                    <div class="grid-content bg-purple-light" id="form">
                        <el-form ref="form" :model="form" :rules="rules" label-width="80px"
                                 :label-position="labelPosition">
                            <el-form-item label="授权日期" prop="date">
                                <el-date-picker
                                    v-model="form.date"
                                    type="date"
                                    placeholder="请选择授权日期"
                                    value-format="yyyy.MM.dd" @change="changeDate">
                                </el-date-picker>
                            </el-form-item>
                            <el-form-item label="项目" prop="project">
                                <el-select v-model="form.project" placeholder="请选择项目" @change="changeProject">
                                    <el-option
                                        v-for="item in projects"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value">
                                    </el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item label="客户姓名/单位" prop="name">
                                <el-input v-model="form.name" placeholder="请输入客户姓名" maxlength="18"></el-input>
                            </el-form-item>
                            <el-form-item label="地区" v-show="form.project != 3" prop="area">
                                <el-input v-model="form.area" placeholder="请输入地区"></el-input>
                            </el-form-item>
                            <el-form-item label="地区首字母" prop="areaInitial">
                                <el-input v-model="form.areaInitial" placeholder="请输入地区首字母"></el-input>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary" @click="submitForm('form')">提交</el-button>
                                <el-button @click="resetForm('form')">重置</el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </el-col>
            </el-row>
        </el-main>
    </el-container>
</div>

</body>
<script src="js/vue.js"></script>
<script src="js/element_ui.js"></script>
<script src="js/html2canvas.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: function () {
            return {
                labelPosition: 'top',
                form: {
                    project: 0,
                    name: '',
                    area: '',
                    areaInitial: '',
                    date: '',
                },
                rules: {
                    date: [
                        {type: 'string', required: true, message: '请选择授权日期', trigger: 'change'}
                    ],
                    project: [
                        {required: true, message: '请选择项目', trigger: 'change'}
                    ],
                    name: [
                        {required: true, message: '请输入客户姓名', trigger: 'blur'},
                    ],
                    area: [
                        {required: true, message: '请输入地区', trigger: 'blur'}
                    ],
                    areaInitial: [
                        {required: true, message: '请输入地区首字母', trigger: 'blur'},
                        {pattern: /^[A-Z]+$/, message: '只能输入大写字母'}
                    ],
                },
                projects: [{
                    value: 0,
                    label: '拓客来',
                    logo: 'images/tkl_logo.png',
                    en: 'TKL',
                }, {
                    value: 1,
                    label: '码上拓客',
                    logo: 'images/mstk_logo.png',
                    en: 'MSTK',
                }, {
                    value: 2,
                    label: '拓客多多',
                    logo: 'images/tkdd_logo.png',
                    en: 'TKDD',
                }, {
                    value: 3,
                    label: '扫码有钱',
                    logo: 'images/smyq_logo.png',
                    en: 'SMYQ',
                }, {
                    value: 4,
                    label: '获客大师',
                    logo: 'images/hkds_logo.png',
                    en: 'HKDS',
                }, {
                    value: 5,
                    label: '门店拓客联盟',
                    logo: 'images/mdtklm_logo.png',
                    en: 'MDTKLM',
                }],
                logo: 'images/tkl_logo.png',
                formatDate: '',
                certUrl: ''
            }
        },
        methods: {
            changeProject() {
                this.logo = this.projects[this.form.project].logo;
            },
            changeDate() {
                this.formatDate = this.form.date.replace(/\./g, "");
            },
            cert() {
                html2canvas(document.getElementById('main'), {
                    backgroundColor: 'transparent',
                    allowTaint: true,
                    dpi: 300,
                    scale: 4
                }).then(canvas => {
                    // axios.post('/cert', {
                    //     project: this.projects[this.form.project].label,
                    //     data_url: canvas.toDataURL("image/png")
                    // }, {
                    //     responseType: 'blob'
                    // }).then((res) => {
                    //     const linkNode = document.createElement('a')
                    //     linkNode.download = this.projects[this.form.project].label // a标签的download属性规定下载文件的名称
                    //     linkNode.style.display = 'none'
                    //     linkNode.href = URL.createObjectURL(res.data) // 生成一个Blob URL
                    //     document.body.appendChild(linkNode)
                    //     linkNode.click() // 模拟在按钮上的一次鼠标单击
                    //     URL.revokeObjectURL(linkNode.href) // 释放URL 对象
                    //     document.body.removeChild(linkNode)
                    // })
                    var base64ImgSrc = canvas.toDataURL("image/png")
                    /* 如果只是显示,可用以下代码 */
                    var img = document.createElement("img")
                    img.src = base64ImgSrc
                    document.body.appendChild(img)
                })
            },
            submitForm(form) {
                this.$refs[form].validate((valid) => {
                    if (valid) {
                        this.cert();
                    }
                });
            },
            resetForm(form) {
                this.$refs[form].resetFields();
            },
            logout() {
                window.location.href = '/logout';
            }
        },
    })
</script>
</html>
