<template>
  <div id="app">
    <Header></Header>
    <router-view/>
    <div class="ad" v-show="isShow">
        <el-popover
          placement="top"
          :visible-arrow ="false"
          width="160"
          popper-class ="adName"
          v-model="isShow">
          <el-row>
            <el-col :span="8">&nbsp;</el-col>
            <el-col :span="16" class="adContent">
              <p>医学论文快速发表, 审稿快, 见刊快, 稳妥发表,不成功不收费, 省级，国家级, 核心期刊，SCI全面操作</p>
            </el-col>
          </el-row>
          <div style="text-align: right; margin-top: 20px">
            <el-button  type="plain" size="small" plain @click="isShow = false">稍后再说</el-button>
            <el-button  type="plain" size="small" @click="eventQQ();isShow = false">现在咨询</el-button>
          </div>
          <!-- <el-button slot="reference"></el-button> -->
        </el-popover>
    </div>
    <Footer></Footer>
  </div>
</template>

<script>
import Header from "@/components/header";
import Footer from "@/components/footer";
export default {
  name: 'App',
  data(){
    return{
      isShow:false,

    }
  },
  methods:{
    eventQQ(){
      window.open("http://wpa.qq.com/msgrd?v=3&uin=499350403&site=qq&menu=yes")
    }
  },
  mounted(){
    let _this = this;
    setInterval(() =>{
      _this.isShow = true;
    },120*1000)
  },
  components:{
    Header,
    Footer
  }
}
</script>

<style>
.ad .adName{
  width: 426px!important;
  height: 175px;
  background: #4587e8 url("./assets/image/kefu.png") no-repeat;
}
.adName .el-button{
  font-size: 16px;
}
</style>

<style lang="scss" scoped>
#app{
  width: 90%;
  margin: 0 auto;
}
.ad{
  width: 300px;
  height: 200px;
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  z-index: 10;
}
.ad .adContent{
    p{
      font-size: 16px;
      color: #fff;
      padding: 20px;
    }
  }
</style>
