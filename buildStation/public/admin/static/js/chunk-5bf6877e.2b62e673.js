(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-5bf6877e"],{"029e":function(e,t,a){"use strict";a("427c")},"162c":function(e,t,a){"use strict";a.r(t);var c=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"login-container"},[a("el-form",{ref:"ref",staticClass:"login-form",attrs:{model:e.model,rules:e.rules,"label-position":"left"}},[a("div",{staticClass:"title-container"},[a("h3",{staticClass:"title"},[e._v(e._s(e.systemName))])]),a("el-form-item",{attrs:{prop:"username"}},[a("el-input",{attrs:{type:"text",placeholder:"账号/手机/邮箱","prefix-icon":"el-icon-user",autocomplete:"on",clearable:""},model:{value:e.model.username,callback:function(t){e.$set(e.model,"username",t)},expression:"model.username"}})],1),a("el-form-item",{attrs:{prop:"password"}},[a("el-input",{attrs:{type:"password",placeholder:"请输入密码","prefix-icon":"el-icon-lock",autocomplete:"on",clearable:"","show-password":""},model:{value:e.model.password,callback:function(t){e.$set(e.model,"password",t)},expression:"model.password"}})],1),e.captcha_switch?a("el-form-item",{attrs:{prop:"captcha_code"}},[a("el-col",{attrs:{span:13}},[a("el-input",{attrs:{placeholder:"请输入验证码","prefix-icon":"el-icon-picture",autocomplete:"off",clearable:""},model:{value:e.model.captcha_code,callback:function(t){e.$set(e.model,"captcha_code",t)},expression:"model.captcha_code"}})],1),a("el-col",{attrs:{span:11}},[a("el-image",{staticStyle:{width:"200px",height:"36px",float:"right"},attrs:{src:e.captcha_src,fit:"fill",alt:"验证码",title:"点击刷新验证码"},on:{click:e.captcha}})],1)],1):e._e(),a("el-button",{staticStyle:{width:"100%","margin-bottom":"30px"},attrs:{loading:e.loading,type:"primary"},nativeOn:{click:function(t){return t.preventDefault(),e.handleLogin(t)}}},[e._v("登录")])],1)],1)},r=[],o=(a("5e68"),a("83d6")),i=a.n(o),n=a("337d"),s={name:"Login",components:{},data:function(){return{systemName:i.a.systemName,loading:!1,redirect:void 0,otherQuery:{},captcha_src:"",captcha_switch:0,model:{username:"",password:"",captcha_id:"",captcha_code:""},rules:{username:[{required:!0,message:"请输入账号",trigger:"blur"}],password:[{required:!0,message:"请输入密码",trigger:"blur"}],captcha_code:[{required:!0,message:"请输入验证码",trigger:"blur"}]}}},watch:{$route:{handler:function(e){var t=e.query;t&&(this.redirect=t.redirect,this.otherQuery=this.getOtherQuery(t))},immediate:!0}},created:function(){this.captcha()},mounted:function(){},destroyed:function(){},methods:{captcha:function(){var e=this;this.model.captcha_id="",this.model.captcha_code="",Object(n["a"])().then((function(t){e.model.captcha_id=t.data.captcha_id,e.captcha_src=t.data.captcha_src,e.captcha_switch=t.data.captcha_switch}))},handleLogin:function(){var e=this;this.$refs["ref"].validate((function(t){if(!t)return!1;e.loading=!0,e.$store.dispatch("user/login",e.model).then((function(){e.$router.push({path:e.redirect||"/",query:e.otherQuery}).catch((function(){})),e.loading=!1})).catch((function(){e.loading=!1}))}))},getOtherQuery:function(e){return Object.keys(e).reduce((function(t,a){return"redirect"!==a&&(t[a]=e[a]),t}),{})}}},l=s,d=(a("5173"),a("029e"),a("4ac2")),u=Object(d["a"])(l,c,r,!1,null,"1d514392",null);t["default"]=u.exports},"427c":function(e,t,a){},"4eeb":function(e,t,a){},5173:function(e,t,a){"use strict";a("4eeb")}}]);