<template>
<div>
    <h5 class="fw-bold mt-3">Group List</h5>
      <div class="card" v-if="user_role == 'admin'">
        <table class="table table-striped table-hover mb-0">
          <thead>
            <tr>
              <th scope="col">#ID</th>
              <th scope="col">Group Name</th>
              <th scope="col">Users</th>
              <th scope="col">Created At</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="group in groups" :key="group.id">
              <th scope="row">{{group.id}}</th>
              <td>{{group.name}}</td>
              <td>{{group.users}}</td>
              <td>{{group.created_at}}</td>
              <td>
                <button type="button" class="btn btn-warning btn-sm me-2" data-toggle="modal" :data-target="'#add_group_id_' + group.id">Add User</button>
                <button type="button" class="btn btn-primary btn-sm me-2" data-toggle="modal" :data-target="'#edit_group_id_' + group.id">Edit Users</button>
                <button @click="deleteGroup(group.id)" class="btn btn-danger btn-sm">Delete</button>
              </td>
               <!-- Join/Edit Group Modal --> 
              <join-group-component title="Add User Group" :modal_id="'add_group_id_'+group.id" :group="group"></join-group-component>  
              <edit-group-component title="Edit Users Group" :modal_id="'edit_group_id_'+group.id" :group="group"></edit-group-component>  
            </tr>
          </tbody>

        </table>
      </div>
</div>

</template>

<script>
export default {
  name: 'GroupListComponent',
  data(){ return { groups:[],user_role:String}},
  mounted(){ 
    this.getGroupList(),
    this.userRole(); 
  },
  methods: {
    async getGroupList(){
        await axios.get('http://localhost:8000/api/internations/groups')
        .then(({data})=>{
            this.groups = data.groups
      });
    },
    async deleteGroup(id){
      await axios.delete(`http://localhost:8000/api/internations/groups/delete/${id}`)
      .then(({data})=>{
        console.log(data);        
        this.groups = data.groups;
      });
    },
    async userRole(){
      await axios.get('http://localhost:8000/api/internations/user/role')
      .then(({data})=>{
        console.log(data);
        this.user_role = data
      });
    },
  }
}
</script>
