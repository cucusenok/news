const apiURLS = {
    'post_view' : 'post/view',
    'post_list' : 'post/list',
    'comment_list_by_post_id' : 'comments'
};

const API_PREFIX = '/api/';

/**
 * Simple decorator on fetch method
 * @param {string} name - the name of api method, existing in apiURLS array
 * @param {array} params - list of params
 * @param {object} paramsGET - list of GET params
 * @param {object} option - list of fetch options
 * @return {Promise<Response>}
 */
function apiRequest(name, params, paramsGET, option) {
    return fetch( generateLink(name, params, paramsGET), option)
}

/**
 * Generate link for api query
 * @param name - the name of api method, existing in apiURLS array
 * @param params - list of params
 * @param paramsGET - list of GET params
 * @return {string} - generated ulr
 */
function generateLink(name, params, paramsGET) {
    let link =   API_PREFIX
    + getApiURL(name, params)
    +  ((paramsGET == undefined) ? '' : createGETParams(paramsGET));
    console.log(link);
    return link;
}

/**
 * Create link by GET params
 * Like a ?p1=1&p2=2&...pn=n
 * @param params
 * @return {string}
 */
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
