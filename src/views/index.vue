<template>
  <div class="home">
    <!-- 内容 -->
    <div class="img-index">
      <!-- <img src="./../assets/image/index.jpg" alt="" width="100%"> -->
      <el-carousel :interval="5000" arrow="always">
        <el-carousel-item v-for="item in 4" :key="item">
          <img src="./../assets/image/index.jpg" alt="" width="100%" height="300">
        </el-carousel-item>
      </el-carousel>
    </div>
    <div class="contain">
      <el-row :gutter="21">
        <el-col :span="4">
          <h3>联系方式</h3>
          <ul class="boderColor">
            <li>吴编辑</li>
            <li>QQ：421439703</li>
            <li>电话：15267003953</li>
            <li>微信号：15997929975</li>
            <li style="margin-top:10px">余编辑</li>
            <li>QQ：499350403</li>
            <li>电话：13041681090</li>
            <li>微信号：13041681090</li>
          </ul>
        </el-col>
        <el-col :span="16">
          <h3>医学期刊目录</h3>
          <div class="boderColor">
            <el-collapse   v-model="activeNames">
              <el-collapse-item title="省级期刊"  name="1">
              <el-row class="titleTwo">
              <el-col :span="6">&nbsp;</el-col>
              <el-col :offset="12" :span="6" style="text-align:right;cursor: pointer;"> <span @click="more(1)">更多</span> </el-col>
            </el-row>
            <el-row>
              <el-col :span="6"  v-for="(item,index) in provincialList" :key="index + 'a'">
                <el-tooltip :content="item.periodicalName" placement="right" effect="light">
                    <img :src= "require(`./../assets/image/${item.articleId}.jpg`)"  width="91" height="117" @click="jump(item.articleId)">
                </el-tooltip>
                <h4>{{item.periodicalName}}</h4>
              </el-col>
            </el-row>
              </el-collapse-item>
              <el-collapse-item title="国家级期刊" name="2">
                            <el-row class="titleTwo">
              <el-col :span="6">&nbsp;</el-col>
              <el-col :offset="12" :span="6" style="text-align:right;cursor: pointer;"> <span @click="more(2)">更多</span> </el-col>
            </el-row>
            <el-row>
              <el-col :span="6"  v-for="(item,index) in countryList" :key="index + 'a'">
                <el-tooltip :content="item.periodicalName" placement="right" effect="light">
                    <img :src= "require(`./../assets/image/${item.articleId}.jpg`)"  width="91" height="117" @click="jump(item.articleId)">
                </el-tooltip>
                <h4>{{item.periodicalName}}</h4>
              </el-col>
            </el-row>
              </el-collapse-item>
              <el-collapse-item title="科技核心期刊" name="3">
                            <el-row class="titleTwo">
              <el-col :span="6">&nbsp;</el-col>
              <el-col :offset="12" :span="6" style="text-align:right;cursor: pointer;"> <span @click="more(3)">更多</span> </el-col>
            </el-row>
            <el-row>
              <el-col :span="6"  v-for="(item,index) in technologyList" :key="index + 'a'">
                <el-tooltip :content="item.periodicalName" placement="right" effect="light">
                    <img :src= "require(`./../assets/image/${item.articleId}.jpg`)"  width="91" height="117" @click="jump(item.articleId)">
                </el-tooltip>
                <h4>{{item.periodicalName}}</h4>
              </el-col>
            </el-row>
              </el-collapse-item>
              <el-collapse-item title="北大核心期刊"  name="4">
                            <el-row class="titleTwo">
              <el-col :span="6">&nbsp;</el-col>
              <el-col :offset="12" :span="6" style="text-align:right;cursor: pointer;"> <span @click="more(4)">更多</span> </el-col>
            </el-row>
            <el-row>
              <el-col :span="6"  v-for="(item,index) in universityList" :key="index + 'a'">
                <el-tooltip :content="item.periodicalName" placement="right" effect="light">
                    <img :src= "require(`./../assets/image/${item.articleId}.jpg`)"  width="91" height="117" @click="jump(item.articleId)">
                </el-tooltip>
                <h4>{{item.periodicalName}}</h4>
              </el-col>
            </el-row>
              </el-collapse-item>
            </el-collapse>
          </div>
        </el-col>
        <el-col :span="4">
           <rightSide></rightSide>
           <br>
           
           <span style="font-size:15px;color:red;font-weight:bold">在线</span><span style="font-size:15px;font-weight:bold">统计</span>
           <table class="totalTable">
             <tr>
               <td>总访问量</td>
               <td>1840899</td>
             </tr>
             <tr>
               <td>统计天数</td>
               <td>2446</td>
             </tr>
             <tr>
               <td>最高记录</td>
               <td>6332</td>
             </tr>
             <tr>
               <td>今日</td>
               <td>875</td>
             </tr>
             <tr>
               <td>昨日</td>
               <td>816</td>
             </tr>
             <tr>
               <td>日均</td>
               <td>752</td>
             </tr>
           </table>
        </el-col>
      </el-row>
    </div>
  </div>
</template>

<script>
import {searchList ,searchAll,getIdList,getTypeList} from "@/api/index";
import rightSide from "@/components/rightSide";
export default {
  data(){
    return{
      activeNames: ['1','2','3','4'],
      provincialList:[],
      countryList:[],
      universityList:[],
      technologyList:[],
      recommendList:[],

    }
  },
  methods:{
    jump(e,type){
       window.open(this.$router.resolve({ path: '/article',query: {id: e} }).href, '_blank');
    },
    faqJump(e,type){
       window.open(e,'_blank');
    },
    changeList(list){
      for(let i of list){
        if(i.periodicalLevel == "省级"){
          this.provincialList.push(i)
        }else if(i.periodicalLevel == "国家级"){
          this.countryList.push(i)
        }else if(i.periodicalLevel == "统计源核心"){
          this.technologyList.push(i)
        }else if(i.periodicalLevel == "北大核心"){
          this.universityList.push(i)
        }
      }
      this.provincialList=  this.provincialList.slice(0,8);
       this.countryList = this.countryList.slice(0,8);
       this.technologyList = this.technologyList.slice(0,8);
       this.universityList = this.universityList.slice(0,8);
    },
    more(type){
      switch(type){
        case 1 : window.open(this.$router.resolve({ path: '/articleList',query: {type:"1"} }).href, '_blank');
        break;
        case 2 : window.open(this.$router.resolve({ path: '/articleList',query: {type:"2"} }).href, '_blank');
        break;
        case 3 : window.open(this.$router.resolve({ path: '/articleList',query: {type:"3"} }).href, '_blank');
        break;
        case 4 : window.open(this.$router.resolve({ path: '/articleList',query: {type:"4"} }).href, '_blank');
        break;
        default:;
      }
    }
  },
  mounted(){
    searchAll()
    .then(res =>{
       this.changeList(res);
    })
    .catch(error =>{
    })
  },
      components: {
    rightSide,
  },
}
</script>

<style>
.home .el-carousel__item {
    /* color: #475669; */
    font-size: 14px;
    opacity: 0.75;
    margin: 0;
    line-height: 200px;
  }
</style>

<style lang="scss" scoped>
.contain{
  .contain-left{
    border: 1px solid #dadada;
  }
  li{
    line-height: 30px;
    &:hover{
      color: #900
    }
    span{
      cursor: pointer;
    }
  }
  h3{
    font-size: 17px;
    line-height: 30px;
    font-weight: normal;
    background: #eee;
    border: 1px solid #ccc;
    padding-left: 10px;
  }
  .boderColor {
    border: 1px solid #ccc;
    border-top: 0;
    padding: 10px;
    .el-row{
        font-size: 15px;
        line-height: 30px;
        text-align: center;
        margin: 10px 0;
    }
    .titleTwo{
      text-align: left;
      >div{
        font-size: 16px;
      }
    }
    a{
      overflow:hidden; //超出的文本隐藏
      text-overflow:ellipsis; //溢出用省略号显示
      white-space:nowrap; //溢出不换行
      display: inline-block;
    }
    h4{
      margin-bottom: 20px;
      overflow: hidden;
text-overflow:ellipsis;
white-space: nowrap;
    }
    img{
      cursor: pointer;
    }
  }

}
.totalTable{
  text-align: center;
  margin-top: 10px;
  width: 100%;
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
 td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}

}
</style>
