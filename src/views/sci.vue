<template>
    <div class="sci">
                <div class="nav-breadcrumb">
            <el-breadcrumb separator-class="el-icon-arrow-right">
                <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
                <el-breadcrumb-item>交易流程</el-breadcrumb-item>
            </el-breadcrumb>
        </div>
          <div class="wrapper">
	<img :src="require(`./../assets/image/liucheng.jpg`)" width="1200" height="386">
	
	<div class="fbbz">
		<div class="title">sci发表流程</div>
		<div class="wubuzou">
			<ul>
				<li>
					<div class="left"><img alt="代写毕业论文" :src="require(`./../assets/image/5bu1.png`)"><span>提出发表需求</span></div>
					<div class="right">客户提出发表要求：如sci期刊分值（sci只能指定分值，不能指定具体发表的期刊，如0-1分，1-2分等），收到接收函的时间，文章检索时间等。</div>
					<div class="clearfix"></div>
				</li>
				<li>
					<div class="left"><img alt="代写硕士代笔" :src="require(`./../assets/image/5bu2.png`)"><span>报价</span></div>
					<div class="right">根据客户发表的分值和要求来报价。</div>
					<div class="clearfix"></div>
				</li>
				<li>
					<div class="left"><img alt="硕士论文代写" :src="require(`./../assets/image/5bu3.png`)"><span>支付定金</span></div>
					<div class="right">客户支付定金，支付方式：支持网银，支付宝 ，银行转账，ATM转账，微信转账，淘宝交易等</div>
					<div class="clearfix"></div>
				</li>
				<li>
					<div class="left" style="position:relative;top:50px"><img alt="毕业论文代写" :src="require(`./../assets/image/5bu4.png`)"><span>拟题写作送审</span></div>
					<div class="right">根据客户的研究方向来拟题，客户选好题目后开始写作，文章写好后，文章摘要发客户审阅（文章只能看摘要），确认无误后安排文章送审，文章录用后，会截图给客户看录用邮件和官网投稿进度，确认无误后客户支付尾款，然后我这边会把文章全文，投稿邮箱账户密码，官网投稿账户密码等资料都发给客户。</div>
					<div class="clearfix"></div>
				</li>
				<li>
					<div class="left"><img alt="代写mba论文" :src="require(`./../assets/image/5bu5.png`)"><span>上线和检索时间</span></div>
					<div class="right">到了出刊时间，就可以在杂志社官网搜索到文章，等待一段时间后，就能在sci数据库检索到这篇文章。</div>
					<div class="clearfix"></div>
				</li>
				
			</ul>
		</div>
	</div>
        </div>
    </div>
</template>

<script>

export default {
    data(){
        return{
            list :[]
        }
    },
}
</script>

<style lang="scss" scoped>
.wrapper{text-align: center;}
.fbbz{padding: 50px 0 30px 0;}
.fbbz .title{background: url(../assets/image/all_point.png) no-repeat center bottom; padding-bottom: 28px;font-size: 35px; text-align: center; font-weight: bold; color: #E00B3F;}
.fbbz .wubuzou{ width: 900px; margin: 30px auto;}
.fbbz .wubuzou ul li{margin-bottom: 30px;    overflow: hidden;}
.fbbz .wubuzou ul li .left{ width: 150px; float: left;}
.fbbz .wubuzou ul li .left img{width: 80px; height: 80px; display: block; margin: 5px auto 10px auto;}
.fbbz .wubuzou ul li .left span{display: block; font-size: 18px; text-align: center;}
.fbbz .wubuzou ul li .right{line-height: 200%; width: 670px; float: right; padding: 20px 0 20px 50px; font-size: 20px;border-left: 6px dotted #bb0e39;}
</style>
