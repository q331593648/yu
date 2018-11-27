<template>
  <div class="rightSide">
     <h3>资料</h3>
          <el-row  class="boderColor">
             <ul>
                <li v-for="(item,index) in FAQList" :key="index + 'f'">
                  <span @click="faqJump(item.url,item.name)">{{item.name}}</span>
                </li>
              </ul>
          </el-row>
          
  </div>
</template>

<script>
import {searchList ,searchAll,getIdList,getTypeList} from "@/api/index"

export default {
  data(){
    return{
        FAQList:[
        {articalId:1,name:'2018年中国科技核心目录',url:1},
        {articalId:2,name:'2014版北大中文核心期刊目录(第7版)',url:2},
        {articalId:3,name:'2017-2018年度CSCD期刊目录',url:3},
        {articalId:5,name:'中国知网',url:"http://www.cnki.net/"},
        {articalId:6,name:'万方医学网',url:"http://med.wanfangdata.com.cn/"},
        {articalId:7,name:'新闻出版总署',url:"http://www.sapprft.gov.cn/"},
        {articalId:8,name:'中国科学技术信息研究所',url:"http://www.istic.ac.cn/"},
      ],
    }
  },
  mounted(){
    searchAll()
    .then(res =>{
       this.expList = res.splice(1,20);
    })
    .catch(error =>{
    })
  },
  methods:{
     faqJump(e,type){
       if(e == 1){
       window.open("../../static/1.rar");
       }else if(e == 2){
        window.open("../../static/2.rar");
       }else if(e == 3){
        window.open("../../static/3.rar");
       }else{
        window.open(e, '_blank');
       }
    },
  }
}
</script>

<style lang="scss" scoped>
  .rightSide {
    border: 1px solid #ccc;
    h3{
      font-size: 20px;
      text-align: center;
    }
    li{
    line-height: 30px;
  span{
      cursor: pointer;
          &:hover{
            color: #4587e8;
        }
  }
    }
  }
    h3{
    font-size: 17px;
    line-height: 30px;
    font-weight: normal;
    background: #eee;
    padding-left: 10px;
  }
  .boderColor {
    border-top: 0;
    padding: 10px;
    .el-row{
        font-size: 15px;
        line-height: 30px;
        text-align: center;
        margin: 10px 0;
    }
  }
</style>
