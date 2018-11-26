import Axios from 'axios'
/**
 * Created by huangshengtao on 2018-8-21.
 */
Axios.defaults.headers = {
'Content-Type': 'application/json;charset=UTF-8'
}
const baseUrl = "http://localhost/?rout=";
export const searchAll  = () => { //获取搜索结果请求
  return Axios({
      url: baseUrl + "getArticleAll",
      method: 'get',
    })
    .then(res => res.data)
}
export const searchList  = (list) => { //获取搜索结果请求
  
  let data ={
    searchKey : list.searchKey,
    pageNum : list.pageNum,
    pageSize : list.pageSize,
  }
  return Axios({
      url: baseUrl + "getArticlePagination&pageNum=" + data.pageNum + "&pageSize=" + data.pageSize + "&searchKey=" +  encodeURI(data.searchKey),
      method: 'get',
    })
    .then(res => res.data)  
}
export const getIdList  = (data) => { //获取id查询
  return Axios({
      url: baseUrl + "getArticle&articleId=" + data,
      method: 'get',
    })
    .then(res => res.data)
}
export const getTypeList  = (val) => { //获取type搜索结果请求
  let data ={
    type : val.type,
    pageNum : val.pageNum,
    pageSize : val.pageSize,
  }
  switch(val.type){
    case "1": data.type = "省级";
    break;
    case "2": data.type = "国家级";
    break;
    case "3": data.type = "统计源核心";
    break;
    case "4": data.type = "北大核心";
    break;
    default:;
  }
  return Axios({
      url: baseUrl + "getArticleByPeriodicalLevel&pageNum=" + data.pageNum + "&pageSize=" + data.pageSize + "&periodicalLevel="+ encodeURI(data.type),
      method: 'get',
    })
    .then(res => res.data)
}