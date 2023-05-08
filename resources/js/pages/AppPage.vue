<template>
<div>
    <!-- Banner -->
    <banner-component></banner-component>
    <!-- Content -->
    <div class="container py-5">
        <!-- Users List -->
        <users-list-component></users-list-component>
        <!-- Groups List -->
        <groups-list-component></groups-list-component>
    </div>
    <!-- Create User Modal -->
    <create-user-component title="Create User" modal_id="create_user_modal"></create-user-component>
    <!-- Create Group Modal -->
    <create-group-component title="Create Group" modal_id="create_group_modal"></create-group-component>
  </div>
</template>