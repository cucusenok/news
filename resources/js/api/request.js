import store from "../store/store"


const apiURLS = {
    'post_view' : 'post/view',
    'post_list' : 'post/list',
    'post_new' : 'post/new',
    'post_image_upload' : 'media/post_image_upload',
    'comment_list_by_post_id' : 'comments',

    'login' : 'auth/login',
};

const API_PREFIX = '/api/';


//simple decorator on fetch method
function apiRequest(name, params, options) {
    let link = generateLink(name, params, options);
    let newOptions = options.method == 'POST' ? addBodyToOption(options, params) : options
    newOptions = addHeaders(newOptions)
    return fetch( link, newOptions)
}

function addHeaders(options){
    options.headers = {
        'Content-Type': 'application/json',
        'Authorization' :  'Bearer ' + store.getters.token,
    }
    return options;
}

function addBodyToOption(options, params) {
    options.body = JSON.stringify(params)
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content
    options.headers = {
        'X-XSRF-TOKEN' : csrfToken,
    }
    return options;
}

function generateLink(name, params, options) {
    const isGetMethod = (options === undefined || options.method !== 'POST')
    let getParams = isGetMethod ? createGETParams(params) : '';
    let link = API_PREFIX + getApiURL(name) + getParams;
    return link;
}

/**
 * Create link by GET params
 * Like a ?p1=1&p2=2&...pn=n
 * @param params
 * @return {string}
 */
function createGETParams(params) {
    if(params === undefined) return '';

    const paramsSingleTypes = ['number', 'string'];
    //Если параметр не передан как объект,
    // а передан как часть ссылки
    // Например post/view/id
    if( paramsSingleTypes.includes(typeof params) )
        return '/' + params;

    // Проитерируемся по ключам параметров, которые
    // являются Ключами GET запроса и проставим им value
    let getParams = Object.keys(params)
                    .map( key => (key + '=' + params[key]) )
                    .join('&');

    return '?' + getParams;
}


function getApiURL(name, params) {
   return apiURLS[name];
}


export { apiRequest, generateLink };
