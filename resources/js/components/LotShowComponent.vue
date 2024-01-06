<template>
    <div>
      <h1>Lot {{ lot.id }}</h1>
      <p><strong>Name:</strong> {{ lot.name }}</p>
      <p><strong>Seller:</strong> {{ lot.seller }}</p>
      <p><strong>Price:</strong> {{ lot.price }}</p>
      <p><strong>Interest:</strong> {{ lot.interest }}%</p>
      <p><strong>Tenure:</strong> {{ lot.tenure }} days</p>
      <p><strong>Maturity:</strong> {{ lot.maturity }}</p>
      <p><strong>Created:</strong> {{ lot.created_at }}</p>
    </div>
  </template>

  <script>
  export default {
    props: ['id'],
    data() {
      return {
        lot: {}
      };
    },
    created() {
      // Make an API request to fetch the lot data based on the ID
      axios.get(`/api/lots/${this.id}`).then(response => {
        this.lot = response.data;
      });
    }
  };
  </script>
