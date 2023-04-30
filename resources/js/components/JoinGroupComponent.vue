
<template>
    <div class="modal fade" :id="modal_id" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{title}} / {{group.name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form @submit="addUserToGroup">
                        <strong>Add user to group:</strong>
                        <select class="form-control form-control-sm" @change="getSelectedGroup($event)">
                            <option selected disabled>Chose one user</option>
                             <option v-for="user in users" :key="user.id" :value="user.name">{{user.name}}</option>
                        </select>
                        <button class="btn btn-primary my-3">Add User to Group</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'JoinGroupComponent',
    data:()=>({
       users:[],
       user_name:''
    }),
    props: { title:String, modal_id:String, group:Object },
    mounted(){ this.getUserList() },
    methods: {
        async getUserList(){
            await axios.get('http://localhost:8000/api/internations/users')
            .then(({data})=>{
                this.users = data
            });
        },
        async addUserToGroup(){
            await axios.put('http://localhost:8000/api/internations/groups/add_user', {
                group_id: this.group.id,
                user_name: this.user_name
            }).then(({data})=>{
                console.log(data);
            });
        },
        getSelectedGroup(e){
            this.user_name = e.target.value;
        }
    }
}
</script>