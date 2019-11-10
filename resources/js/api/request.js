const apiURLS = {
    'post_view' : 'post/view',
    'post_list' : 'post/list',
};


const API_PREFIX = '/api/';

//simple decorator on fetch method
function apiRequest(name, params, paramsGET, option) {
    return fetch( generateLink(name, params, paramsGET), option)
}

function generateLink(name, params, paramsGET) {
    let res =   API_PREFIX
    + getApiURL(name, params)
    +  ((paramsGET == undefined) ? '' : createGETParams(paramsGET));
    return res;
}


function createGETParams(params) {
    const keys =  Object.keys(params);
    return '?' + keys[0] + '=' + params[keys[0]];
}

function getApiURL(name, params) {
   return params ? (apiURLS[name] + '/' + params) : apiURLS[name];
}

function test() {
    console.log('its test');
}

export { apiRequest, generateLink };
