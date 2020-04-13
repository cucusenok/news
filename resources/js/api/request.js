const apiURLS = {
    'post_view' : 'post/view',
    'post_list' : 'post/list',
    'post_new' : 'post/new',
    'post_image_upload' : 'media/post_image_upload',
    'comment_list_by_post_id' : 'comments'
};


const API_PREFIX = '/api/';


//simple decorator on fetch method
function apiRequest(name, params, options) {
    let link = generateLink(name, params, options);
    let newOptions = options.method == 'POST' ? addBodyToOption(options, params) : options
    console.log(options);
    return fetch( link, options)
}


function addBodyToOption(options, params) {
    options.body = JSON.stringify(params)
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content
    options.headers = {
        'Content-Type': 'application/json',
        'X-XSRF-TOKEN' : csrfToken
    }
    return options;
}

function generateLink(name, params, options) {
    const isGetMethod = (options === undefined || options.method !== 'POST')
    let getParams = isGetMethod ? createGETParams(params) : '';
    let link = API_PREFIX + getApiURL(name) + getParams;
    return link;
}


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
