<template>
  <div class="footer">
        <el-row>
          <el-col :span="16" :offset="4">
        <div  class="link_bg">
          <p class="linkleft_bg">
            
            <span>【链接申请】</span>
          </p>
        </div>
          </el-col>
          <el-col :span="4"></el-col>
        </el-row>
  <div class="footerB">
    <p>Copyright © 2018-2019</p>
    <p>百事帮医学网版权所有</p>
  </div>
  </div>
</template>

<style lang="scss" scoped>
.link_bg{ background:url(../assets/image/link_bg.gif) left repeat-x; height:71px;}
.linkleft_bg{ background:url(../assets/image/link_left.gif) left no-repeat; height:71px; font-size:12px; color:#253C68; line-height:35px; position: relative;}
span{
    position: absolute;
    bottom: 0px;
    left: 177px;
}
.footerB{
  border-top: 1px solid #ccc;
  text-align: center;
  margin-top: 10px;
  padding: 20px;
  margin-bottom: 10px;
  line-height: 1.5;
}
</style>
