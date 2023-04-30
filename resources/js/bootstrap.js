const { default: axios } = require('axios');
const { zip } = require('lodash');

window._ = require('lodash');
try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) { }


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Intercept Requests
axios.interceptors.request.use(
    config => {
        config.headers.Accept = 'application/json';


        let token = document.cookie.split(';').find(indice => {
            return indice.includes('token=')
        })

        token = token.split('=')[1]
        token = 'Bearer ' + token
        config.headers.Authorization = token;

        return config
    },
    error => {
        console.log('Intercepet erros ', error)
        if (error.response.status == 401 && $error.response.data.message == 'Token has expired') {
            axios.post('http://localhost:8000/api/refresh')
                .then(response => {
                    document.cookie = 'token=' + response.data.token
                    window.location.reload();
                })
        }
        return Promise.reject(error)
    }
)

axios.interceptors.response.use(
    response => {
        console.log('Response ', response)
        return response
    },
    error => {
        console.log('Response Error ', error)
        return Promise.reject(error)
    }
)