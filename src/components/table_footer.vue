<template>
     <div class="block">
            <el-pagination
            :pager-count = 7
            :background = true
            @size-change="handleSizeChange"
            @current-change="handleCurrentChange"
            :current-page.sync="currentPage"
            :page-sizes="[12, 24, 36, 48]"
            :page-size="12"
            layout=" prev, pager, next, jumper, total,sizes"
            :total="tableTotal">
            </el-pagination>
        </div>
</template>

<script>
export default {
  props: ["tableTotal"],
  data() {
    return {
      currentPage: 1, //默认显示页数
      pageNum: 1, //当前页
      pageSize: 12, //每页条
      total: "" //总数
    };
  },
  methods: {
    handleSizeChange(val) {
      this.pageSize = val;
      this.pageNum = 1;
      this.currentPage = 1;
      this.getTableData();
    },
    handleCurrentChange(val) {
      this.pageNum = val;
      this.getTableData();
    },
    getTableData() {
      let page = { pageSize: this.pageSize, pageNum: this.pageNum};
      this.$emit("getTableData", page);
    },
    changeCurrentPage(v){
        this.currentPage = v;
    },
  }
};
</script>

<style>
   .block  .el-pagination__sizes{
        margin: 0 20px 0 20px;
    }
   .block  .el-pagination__total{
       margin-left: 20px;
    }
    .block .el-pagination__editor.el-input{
            width: 70px;
    }
    .sideBar .el-dialog{
        min-width:800px;
    }
</style>


<style lang="scss" scoped>
.block{
    text-align: center;
    margin-top: 50px;
    padding-bottom: 20px;
}
</style>
