<template>
  <q-page class="row items-center justify-center">
    <q-table title="Buyers" :rows="rows" :columns="columns" row-key="name" />
  </q-page>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import get from 'axios';

const columns = [
  {
    name: 'id',
    align: 'center',
    label: 'ID',
    field: 'id',
    sortable: true,
  },
  {
    name: 'name',
    align: 'left',
    label: 'Name',
    field: 'name',
    sortable: true,
  },
  {
    name: 'document',
    align: 'left',
    label: 'Document',
    field: 'document',
    sortable: true,
  },
  {
    name: 'active',
    align: 'center',
    label: 'Active',
    field: 'active',
    sortable: true,
  },
  {
    name: 'created_at',
    align: 'center',
    label: 'Created At',
    field: 'created_at',
    sortable: true,
  },
  {
    name: 'updated_at',
    align: 'center',
    label: 'Updated At',
    field: 'updated_at',
    sortable: true,
  },
  // {
  //   name: 'calories',
  //   align: 'center',
  //   label: 'Calories',
  //   field: 'calories',
  //   sortable: true,
  // },
  // {
  //   name: 'fat', label: 'Fat (g)', field: 'fat', sortable: true,
  // },
  // { name: 'carbs', label: 'Carbs (g)', field: 'carbs' },
  // { name: 'protein', label: 'Protein (g)', field: 'protein' },
  // { name: 'sodium', label: 'Sodium (mg)', field: 'sodium' },
  // {
  //   name: 'calcium',
  //   label: 'Calcium (%)',
  //   field: 'calcium',
  //   sortable: true,
  //   sort: (a: string, b: string) => parseInt(a, 10) - parseInt(b, 10),
  // },
  // {
  //   name: 'iron',
  //   label: 'Iron (%)',
  //   field: 'iron',
  //   sortable: true,
  //   sort: (a: string, b: string) => parseInt(a, 10) - parseInt(b, 10),
  // },
];

// const rows = [
//   {
//     name: 'Frozen Yogurt',
//     calories: 159,
//     fat: 6.0,
//     carbs: 24,
//     protein: 4.0,
//     sodium: 87,
//     calcium: '14%',
//     iron: '1%',
//   },
//   {
//     name: 'Ice cream sandwich',
//     calories: 237,
//     fat: 9.0,
//     carbs: 37,
//     protein: 4.3,
//     sodium: 129,
//     calcium: '8%',
//     iron: '1%',
//   },
//   {
//     name: 'Eclair',
//     calories: 262,
//     fat: 16.0,
//     carbs: 23,
//     protein: 6.0,
//     sodium: 337,
//     calcium: '6%',
//     iron: '7%',
//   },
//   {
//     name: 'Cupcake',
//     calories: 305,
//     fat: 3.7,
//     carbs: 67,
//     protein: 4.3,
//     sodium: 413,
//     calcium: '3%',
//     iron: '8%',
//   },
//   {
//     name: 'Gingerbread',
//     calories: 356,
//     fat: 16.0,
//     carbs: 49,
//     protein: 3.9,
//     sodium: 327,
//     calcium: '7%',
//     iron: '16%',
//   },
//   {
//     name: 'Jelly bean',
//     calories: 375,
//     fat: 0.0,
//     carbs: 94,
//     protein: 0.0,
//     sodium: 50,
//     calcium: '0%',
//     iron: '0%',
//   },
//   {
//     name: 'Lollipop',
//     calories: 392,
//     fat: 0.2,
//     carbs: 98,
//     protein: 0,
//     sodium: 38,
//     calcium: '0%',
//     iron: '2%',
//   },
//   {
//     name: 'Honeycomb',
//     calories: 408,
//     fat: 3.2,
//     carbs: 87,
//     protein: 6.5,
//     sodium: 562,
//     calcium: '0%',
//     iron: '45%',
//   },
//   {
//     name: 'Donut',
//     calories: 452,
//     fat: 25.0,
//     carbs: 51,
//     protein: 4.9,
//     sodium: 326,
//     calcium: '2%',
//     iron: '22%',
//   },
//   {
//     name: 'KitKat',
//     calories: 518,
//     fat: 26.0,
//     carbs: 65,
//     protein: 7,
//     sodium: 54,
//     calcium: '12%',
//     iron: '6%',
//   },
// ];

const getBuyers = async () : Promise<string[]> => {
  const response = await get('/api/buyers/pagination');
  return response.data.items;
};

const rows = getBuyers().then((resp) => resp);

export default defineComponent({
  name: 'BuyersList',
  setup() {
    return {
      columns,
      rows,
    };
  },
});
</script>
