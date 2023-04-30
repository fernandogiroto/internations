<template>
<div>
    <form method="POST" action="" @submit.prevent="login($event)" class="mb-3">
        <div class="d-flex justify-content-center">
            <img src="/images/logo.png" class="navbar-logo mb-3" alt="Internations Logo">
        </div>
        <input type="hidden" name="_token" :value="csrf_token">
        <div class="mb-3">
            <label for="email" class="form-label ">Email address</label>
            <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus v-model="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label ">Password</label>
            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" v-model="password">
        </div>
        <button class="btn btn-outline-dark mt-3" type="submit">Login</button>
    </form>
    <div>
        <p class="mb-0  text-center">Don't have an account? 
            <a href="/register" class="text-primary fw-bold">Register</a>
        </p>
    </div>
</div>

</template>

<script>
    export default {
        props: ['csrf_token'],
        data() {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            login(e) {
                let url = 'http://localhost:8000/api/login'
                let configuracao = {
                    method: 'post',
                    body: new URLSearchParams({
                        'email': this.email,
                        'password': this.password
                    })
                }
                fetch(url, configuracao)
                    .then(response => response.json())
                    .then(data => {
                        if(data.token) document.cookie = 'token='+data.token+';SameSite=Lax'
                        e.target.submit()
                })
            }
        }
    }
</script>
