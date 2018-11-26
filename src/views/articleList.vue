<template>
    <div class="articleList">
        <div class="nav-breadcrumb">
          <el-breadcrumb separator-class="el-icon-arrow-right">
              <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
              <el-breadcrumb-item>期刊列表</el-breadcrumb-item>
          </el-breadcrumb>
        </div>
      <el-row :gutter = "21">
        <el-col :span="4" class="leftSide mt40">
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
          <span style="font-size:25px">{{typeNmae}}期刊</span>
          <div class="table">
                <el-row>
              <el-col :span="6"  v-for="(item,index) in articleList" :key="index + 'a'">
                  <img :src= "require(`./../assets/image/${item.articleId}.jpg`)"  width="91" height="117" @click="handleClick(item.articleId)">
                <h4>{{item.periodicalName}}</h4>
              </el-col>
            </el-row>
          </div>
          <tableFooter @getTableData="getTableList" :tableTotal="total" ref="tableFooter"></tableFooter>
        </el-col>
        <el-col :span="4" class="mt40">
          <rightSide></rightSide>
        </el-col>
      </el-row>
    </div>
</template>

<script>
import { searchList, searchAll, getIdList, getTypeList } from "@/api/index";
import rightSide from "@/components/rightSide";
import tableFooter from "@/components/table_footer"; //table分页

export default {
  data() {
    return {
      articleList: [],
      loading: false,
      dataList: {
          type:"",
          pageSize: 12,
          pageNum: 1
      },
      total:0,
      typeNmae:"",
    };
  },
  mounted() {
    if (this.$route.query) {
      this.getList(this.$route.query.type);
      this.dataList.type = this.$route.query.type;
    }
  },
  methods: {
    getTableList(v) {
      //分页操作返回的page信息
      this.dataList.pageNum = v.pageNum;
      this.dataList.pageSize = v.pageSize;
      this.getList(this.dataList.type);
    },
    getList(type) {
      this.loading = true;
      this.dataList.type = type;
      getTypeList(this.dataList).then(res => {
        this.typeNmae = res.item[0].periodicalLevel;
        this.articleList = res.item;
        this.total = res.total - 0;
        this.loading = false;
      });
    },
    handleClick(id) {
     window.open(this.$router.resolve({ path: '/article',query: {id: id} }).href, '_blank');
      }
  },
    components: {
    rightSide,
    tableFooter
  },
};
</script>

<style>
.table{
  border: 1px solid #f2f2f2;
  padding: 10px;
  text-align: center;
  margin-top:15px;
}
.mt40{
  margin-top: 40px;
}
</style>
<style lang="scss" scoped>
  h4{
          overflow: hidden;
text-overflow:ellipsis;
white-space: nowrap;
    margin:20px 0;
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
      img{
      cursor: pointer;
    }
  .leftSide{
    h3{
      border: 1px solid #ccc;
    font-size: 17px;
    line-height: 30px;
    font-weight: normal;
    background: #eee;
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
  }
  }
</style>
