<template>
    <div class="searchList">
        <div class="nav-breadcrumb">
            <el-breadcrumb separator-class="el-icon-arrow-right">
                <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
                <el-breadcrumb-item>搜索列表</el-breadcrumb-item>
            </el-breadcrumb>
        </div>
        <el-row>
        <el-col :span="4" class="leftSide ">
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
            <el-col :span="16" style="padding-left:20px">
            <ul>
                <li v-for="(item,index) in searchList" :key="index">
                    <el-row>
                        <el-col :span="12">
                            <span class="searchList-title" @click="jump(item.articleId)">{{item.periodicalName}}</span>
                        </el-col>
                    </el-row>
                    <el-row style="margin-top:10px;padding-left:20px">
                        <el-col :span="9">主管单位：{{item.competentAuthority }}</el-col>
                        <el-col :span="9">主办单位：{{item.sponsoredBy }}</el-col>
                        <el-col :span="6">杂志级别：{{item.periodicalLevel }}</el-col>
                    </el-row>
                </li>
            </ul>
            <div v-show="!total" class="no-data">
               <p> 搜索关键字暂无数据，请重新输入搜索关键字！</p>
            </div>
            <tableFooter @getTableData="getTableList" :tableTotal="total" ref="tableFooter"  v-if="this.total > 10"></tableFooter>
            </el-col>
            <el-col :span="4">
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
      searchList: [],
      dataList: {
          searchKey:"",
          pageSize: 12,
          pageNum: 1
      },
       total: 0
    };
  },
  methods: {
    getTableList(v) {
      //分页操作返回的page信息
      this.dataList.pageNum = v.pageNum;
      this.dataList.pageSize = v.pageSize;
      this.getList(this.dataList.searchKey);
    },
    getList(e) {
        this.dataList.searchKey = e;
        searchList(this.dataList).then(res => {
          this.searchList = res.item;
          this.total = res.total - 0;
        });
      },
          jump(e,type){
       window.open(this.$router.resolve({ path: '/article',query: {id: e} }).href, '_blank');
    },
  },
  components: {
    rightSide,
    tableFooter
  },
    mounted() {
    if (this.$route.query) {
      this.getList(this.$route.query.searchKey);
      this.dataList.searchKey = this.$route.query.searchKey;
    }
  },
    watch: {
    　　'$route': function (to, from) {
        this.dataList.pageSize = 12;
        this.dataList.pageNum = 1;
        this.getList(this.dataList.searchKey = this.$route.query.searchKey)
    　　}
    },
};
</script>

<style lang="scss" scoped>
.no-data {
  text-align: center;
  margin-top: 50px;
}
.searchList{
    .order{
        width: 50px;
    }
    li{
        margin: 20px 0;
    }
    .searchList-title{
        cursor:pointer;
        font-size:16px;
        &:hover{
            color: #4587e8;
        }
    }
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
