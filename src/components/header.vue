<template>
    <div class="header">
        <el-row  class="nav-header">
            <el-col :span="8" >
                <img :src="require(`./../assets/logo.jpg`)" alt="百事帮" width="120">
            </el-col>
            <el-col :span="8" style="margin-top:10px">
                <el-input
                    placeholder="请输入内容"
                    v-model.trim="searchKey"
                     @keyup.enter.native="search">
                    <i slot="suffix" class="el-input__icon el-icon-search" @click="search"></i>
                </el-input>
            </el-col>
            <el-col :span="8" class="tel" style="margin-top:10px">
                <span>咨询热线：</span>
                <span class="phone">152-6700-3953</span>
            </el-col>
        </el-row>
        <el-row class="nav">
            <el-col :span="3"><span @click="jump(1)">首页</span></el-col>
            <el-col :span="4"><span @click="jump(2)">省级期刊</span></el-col>
            <el-col :span="3"><span @click="jump(3)">国家级</span></el-col>
            <el-col :span="4"><span @click="jump(4)">科技核心期刊</span></el-col>
            <el-col :span="4"><span @click="jump(5)">北大核心期刊</span></el-col>
            <el-col :span="3"><span @click="jump(6)">SCI</span></el-col>
            <el-col :span="3"><span @click="jump(7)">交易流程</span></el-col>
        </el-row>
    </div>
</template>


<script>
import {searchList ,searchAll,getIdList,getTypeList} from "@/api/index";

export default {
    data(){
        return{
            nowActive:1,
            searchKey:"",
        }
    },
    methods:{
        jump(e){
            switch(e){
                case 1:
                window.open(this.$router.resolve({ path: '/' }).href, '_blank');
                break;
                case 2:
                window.open(this.$router.resolve({ path: '/articleList',query: {type: 1} }).href, '_blank');
                break;
                case 3:
                window.open(this.$router.resolve({ path: '/articleList',query: {type: 2} }).href, '_blank');
                break;
                case 4:
                window.open(this.$router.resolve({ path: '/articleList',query: {type: 3} }).href, '_blank');
                break;
                case 5:
                window.open(this.$router.resolve({ path: '/articleList',query: {type: 4} }).href, '_blank');
                break;
                case 6:
                window.open(this.$router.resolve({ path: '/sci'}).href, '_blank');
                break;
                case 7:
                window.open(this.$router.resolve({ path: '/jylc'}).href, '_blank');
                break;
                default:;
            }
        },
        search(){
             this.$router.push({ path: '/searchList',query: {searchKey: this.searchKey} });
        }
    },
}
</script>


<style lang="scss" scoped>
.nav .el-col{
    background: #0099cc;
    color: #ffffff;
    font-weight: normal;
    line-height: 40px;
    text-align: center;
    span{
       cursor: pointer;
    }
}
.nav-header{
    line-height: 40px;
    img{
        position: relative;
        top: 10px
    }
}
.active{
    background: #0baee4!important;
}
.tel{
    text-align: right;
    padding-right: 20px;
    span{
    }
    .phone{
        font-size: 24px;
        color:#0b8793
    }
}
</style>
