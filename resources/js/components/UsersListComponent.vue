<template>
<div>
    <h5 class="fw-bold mt-3">Users List</h5>
      <div class="card" v-if="user_role == 'admin'">
        <!-- Table User List -->
        <table class="table table-striped table-hover mb-0">
          <thead>
            <tr>
              <th scope="col">#ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users" :key="user.id">
              <th scope="row">{{user.id}}</th>
              <td>{{user.name}}</td>
              <td>{{user.email}}</td>
              <td>{{user.role}}</td>
              <td>
                 <button @click="deleteUser(user.id)" class="btn btn-danger btn-sm" v-if="user_role != user.role">Delete</button>
              </td>
            </tr>
          </tbody>  
        </table>
      </div>
</div>

</template>

<script>
export default {
  data:()=>({ users:[], user_role:String}),
  mounted(){ 
    this.getUserList();
    this.userRole();
  },
  methods: {
    async getUserList(){
      await axios.get('http://localhost:8000/api/internations/users')
      .then(({data})=>{
        this.users = data
      });
    },
    async userRole(){
      await axios.get('http://localhost:8000/api/internations/user/role')
      .then(({data})=>{
        console.log(data);
        this.user_role = data
      });
    },
    async deleteUser(id){
      await axios.delete(`http://localhost:8000/api/internations/users/delete/${id}`)
      .then(({data})=>{
        console.log(data);
        this.users = data.users;
      });
    }
  }
}
</script>
