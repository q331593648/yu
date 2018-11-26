<template>
    <div class="article">
                <div class="nav-breadcrumb">
            <el-breadcrumb separator-class="el-icon-arrow-right">
                <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
                <el-breadcrumb-item>期刊详情</el-breadcrumb-item>
            </el-breadcrumb>
        </div>
        <el-row>
            <el-col :span="18" class="titleHeader" >
                <p>{{list.periodicalName}}</p>
               
            <el-row>
            <el-col :span="12">
                <ul>
                    <li>
                        <span class="artName">杂志名称：</span>
                        <span>{{list.periodicalName}}</span>
                    </li>
                    <li>
                        <span class="artName">主管单位：</span>
                        <span>{{list.competentAuthority}}</span>
                    </li>
                    <li>
                        <span class="artName">主办单位：</span>
                        <span>{{list.sponsoredBy}}</span>
                    </li>
                    <li>
                        <span class="artName">周期：</span>
                        <span>{{list.cycle}}</span>
                    </li>
                    <li>
                        <span class="artName">国际刊号：</span>
                        <span>{{list.issn}}</span>
                    </li>
                    <li>
                        <span class="artName">国内刊号：</span>
                        <span>{{list.cn}}</span>
                    </li>
                    <li>
                        <span class="artName">杂志级别：</span>
                        <span>{{list.periodicalLevel}}</span>
                    </li>
                </ul>
            </el-col>
            <el-col :span="12" style="text-align: center;">
                <img :src="require(`./../assets/image/${list.articleId}.jpg`)" >
            </el-col>
        </el-row>
            </el-col>
            <el-col :span="6">
                <rightSide></rightSide>
            </el-col>
        </el-row>
        
    </div>
</template>

<script>
import {searchList ,searchAll,getIdList,getTypeList} from "@/api/index";
import rightSide from "@/components/rightSide";

export default {
    data(){
        return{
            list :[]
        }
    },
    mounted(){
        if(this.$route.query){
            this.getList(this.$route.query.id);
        }
    },
    methods:{
        getList(id){
            getIdList(id)
            .then(res =>{
                this.list = res[0];
            })
        }
    },
    components:{
        rightSide
    }
}
</script>

<style lang="scss" scoped>
.article{
    padding: 20px;
    .titleHeader{
        height: 30px;
        line-height: 30px;
        text-align: left;
        font-weight: bold;
        font-size: 20px;
        margin: 20px 0;
        p{
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
        }
    }
    .artName{
        width: 100px;
        display: inline-block;
    }
    li{
        line-height: 50px;
    }
}
</style>
