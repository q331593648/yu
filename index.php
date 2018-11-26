<?php
header("Content-type:text/html;charset=utf8");
header("Access-Control-Allow-Origin: *"); // 允许任意域名发起的跨域请求
header('Access-Control-Allow-Headers: X-Requested-With,X_Requested_With');
// ini_set("display_errors","On");
// error_reporting(E_ALL);
// 
//header('Content-type: application/json'); //json
$localhost = 'qdm169548365.my3w.com';
$db_name = 'qdm169548365_db';
$user_name = 'qdm169548365';
$pass_word = '331593648';


$db = new PDO("mysql:host={$localhost};dbname={$db_name}", $user_name, $pass_word,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"set names utf8"));

function queryAll($db,$sql){
    $sth = $db->query($sql);
    return $sth->fetchAll(PDO::FETCH_ASSOC);

}

function queryOne($db,$sql){
    $sth = $db->query($sql);
    return $sth->fetch(PDO::FETCH_ASSOC);

}

function getArticleAll($db)
{
    $sql = "SELECT * FROM article ";
    return queryAll($db,$sql);
}

function getArticlePagination($db,$index,$pageSize,$searchKey)
{

    $searchKey = urldecode($searchKey);
	
      if(!empty($searchKey)){
        $sql = "SELECT count(*) AS total FROM article WHERE periodicalName LIKE CONCAT('%','{$searchKey}', '%')";
        $total = queryOne($db,$sql);
        $sql = "SELECT * FROM article WHERE periodicalName LIKE CONCAT('%','{$searchKey}', '%') 
limit {$index},{$pageSize} ";
        $ret = queryAll($db,$sql);
    }else{
        $sql = "SELECT count(*) AS total FROM article";
        $total = queryOne($db,$sql);
        $sql = "SELECT * FROM article limit {$index},{$pageSize} ";
        $ret = queryAll($db,$sql);
    }

    $ret  = [
        'total'=>$total['total'],
        'item'=>$ret,
    ];
    return $ret;
}

function getArticleByPeriodicalLevel($db,$index,$pageSize,$periodicalLevel)
{
	$sql = "SELECT count(*) AS total FROM article WHERE periodicalLevel = '{$periodicalLevel}'";
	$total = queryOne($db,$sql);
	$sql = "SELECT * FROM article WHERE periodicalLevel = '{$periodicalLevel}' limit {$index},{$pageSize} ";
	$ret = queryAll($db,$sql);
	$ret  = [
		'total'=>$total['total'],
		'item'=>$ret,
	];
    return $ret;
}

function getArticle($db,$articleId)
{
    $sql = "SELECT * FROM article WHERE articleId = {$articleId}";
    return queryAll($db,$sql);

    //$sql = "SELECT * FROM article WHERE articleId = :articleId";
    //$stmt = $db->prepare($sql);
    //$stmt->execute(array(':articleId'=>$articleId));
    //return $stmt->fetchAll(PDO::FETCH_ASSOC);

}


//路由入口
if(!empty($_GET['rout'])){

    // id查询  /?rout=getArticle&articleId=1
    if($_GET['rout']=='getArticle')
    {
        $articleId = $_GET['articleId'];
        $ret = getArticle($db,$articleId);
        echo json_encode($ret);
    }

    // 查询全部  /?rout=getArticleAll
    if($_GET['rout']=='getArticleAll')
    {
        $ret = getArticleAll($db);
        echo json_encode($ret);
    }

    // 分类查询  /?rout=getArticleByPeriodicalLevel&periodicalLevel=5
    if($_GET['rout']=='getArticleByPeriodicalLevel')
    {	
		$pageIndex = $_GET['pageNum'];
		$pageSize = $_GET['pageSize'];
        $periodicalLevel = $_GET['periodicalLevel'];
		$skip = ((int)$pageIndex - 1) * (int)$pageSize ;
        //var_dump(gettype($periodicalLevel));die;
        //$periodicalLevel = iconv("gb2312","utf-8",$periodicalLevel);
        $ret = getArticleByPeriodicalLevel($db,$skip,$pageSize,$periodicalLevel);
        echo json_encode($ret);
    }

    // 分页查询  /?rout=getArticlePagination&pageIndex=1&pageSize=2&searchKey
    if($_GET['rout']=='getArticlePagination')
    {
        $pageIndex = $_GET['pageNum'];
        $pageSize = $_GET['pageSize'];
        $searchKey = $_GET['searchKey'];

        //转码可以试试这个
        //$searchKey = urldecode($searchKey);
        
        $skip = ((int)$pageIndex - 1) * (int)$pageSize ;
        $ret = getArticlePagination($db,$skip,$pageSize,$searchKey);


        echo json_encode($ret);
    }

}