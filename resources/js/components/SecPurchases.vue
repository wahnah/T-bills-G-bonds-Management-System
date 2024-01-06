<template>
    <div class="text-sm">
  <div v-if="pagination.total > 0">
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
          <th class="px-4 py-3">ISIN</th>
          <th class="px-4 py-3">Seller</th>
          <th class="px-4 py-3">Face Value</th>
          <!--<th class="px-4 py-3 font-semibold">Interest</th>-->
          <th class="px-4 py-3">Tenor</th>
          <th class="px-4 py-3">Coupon Dates</th>
          <th class="px-4 py-3">Maturity Date</th>
          <th class="px-4 py-3">Issue Date</th>
          <th class="px-4 py-3">Invested Amount</th>

        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        <tr v-for="purchase in secpurchases" :key="purchase.lot_id">
          <td class="px-4 py-3 text-sm">{{ purchase.lot_name }}</td>
          <td class="px-4 py-3 text-sm">{{ purchase.seller }}</td>
          <td class="px-4 py-3 text-sm">ZMK{{ purchase.faceValue }}</td>
          <!--<td class="border px-4 py-2">{{ purchase.interest }}%</td>-->
          <td class="px-4 py-3 text-sm">{{ purchase.tenure }} days</td>
          <td class="px-4 py-3 text-sm">{{ purchase.coupon }}</td>
          <td class="px-4 py-3 text-sm">{{ purchase.maturity }}</td>
          <td class="px-4 py-3 text-sm">{{ purchase.created_at }}</td>
          <td class="px-4 py-3 text-sm">ZMK {{ purchase.price }}</td>

        </tr>
      </tbody>
    </table>
    </div>
    </div>


    <!--<div>Total Amount Invested: ZMK {{ total }}</div>-->

    <div class="flex mt-4">
      <div v-if="pagination.current_page !== 1">
        <button v-on:click="getPurchases(pagination.current_page - 1)"
                class="inline-flex items-center justify-center w-10 h-10 mr-2 text-gray-300 transition-colors duration-150 border border-gray-300 rounded-lg focus:shadow-outline hover:bg-gray-300 hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                  d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                  clip-rule="evenodd"/>
          </svg>
        </button>
      </div>
      <div v-if="pagination.current_page !== pagination.last_page">
        <button v-on:click="getPurchases(pagination.current_page + 1)"
                class="inline-flex items-center justify-center w-10 h-10 text-gray-300 transition-colors duration-150 border border-gray-300 rounded-lg focus:shadow-outline hover:bg-gray-300 hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
  <div v-else class="text-gray-600">
    You have no purchases from the Secondary Market.
  </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            secpurchases: {},
            pagination: {},
        }
    },

    computed: {
    total() {
      return this.secpurchases.reduce((accumulator, purchase) => accumulator + parseFloat(purchase.price), 0);
    },
  },
    mounted() {
        this.getPurchases();
    },
    methods: {
        getPurchases(page = 1) {
            axios.get('api/secpurchases?page=' + page)
                .then(response => {
                    this.secpurchases = response.data.data;
                    this.pagination = response.data.meta;
                })
                .catch(error => {
                    console.log(error);
                })
        },

        showDetails(id) {
            window.location.href = '/lots/' + id;
        },

        downloadPDF(lot_id, owner_id) {
            window.location.href = '/awardnotice/' + lot_id + '?owner_id=' + owner_id;
    }
    },

}

</script>
