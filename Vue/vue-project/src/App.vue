<template>
  <div>
    <input type="text" placeholder="name" v-model="name" />
    <input type="text" placeholder="surname" v-model="surname" />
    <input type="text" placeholder="item" v-model="itemName" />
    <input type="number" placeholder="price" v-model="itemPrice" />
    <input type="number" placeholder="quantity" v-model="itemQuantity" />
    <input type="text" placeholder="worker" v-model="worker" />
    <input type="text" placeholder="car" v-model="car" />
    <button @click="addItem">Add Client</button>
    <table>
      <thead>
        <tr>
          <th>name</th>
          <th>surname</th>
          <th>items</th>
          <th>car</th>
          <th>worker</th>
          <th>total price</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="client in clients" v-bind:key="client.id">
          <td>{{ client.name }}</td>
          <td>{{ client.surname }}</td>
          <td>
            <table>
              <thead>
                <tr>
                  <th>item</th>
                  <th>price</th>
                  <th>quantity</th>
                  <th>full price</th>
                </tr>
              </thead>
              <tr v-for="itemd in client.items" v-bind:key="client.id">
                <td>{{ itemd.item }}</td>
                <td>{{ itemd.price }}</td>
                <td>{{ itemd.quantity }}</td>
                <td>{{ itemd.quantity * itemd.price }}</td>
              </tr>
            </table>
          </td>
          <td>
            {{ client.car }}
          </td>
          <td>
            {{ client.worker }}
          </td>
          <td>{{ calculateTotalPrice(client) }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style>
table,
th,
td {
  border: 1px solid black;
}
</style>

<script>
export default {
  data() {
    return {
      clients: [
        {
          name: "Marcin",
          surname: "Kokot",
          worker: "Kowalski",
          car: "BMW",
          items: [
            { item: "cup", price: 12, quantity: "2" },
            { item: "mouse", price: 70, quantity: "1" },
          ],
        },
        {
          name: "Łukasz",
          surname: "Kart",
          worker: "Mielninski",
          car: "Audi",
          items: [{ item: "monitor", price: 200, quantity: "1" }],
        },
      ],
      totalPrice: 0,
    };
  },
  methods: {
    addItem() {
      if (
        !this.name ||
        !this.surname ||
        !this.worker ||
        !this.car ||
        !this.itemName ||
        !this.itemPrice ||
        !this.itemQuantity ||
        this.itemPrice <= 0 ||
        this.itemQuantity <= 0
      ) {
        alert("All fields must be included");
        return;
      }

      const newItem = {
        name: this.name,
        surname: this.surname,
        worker: this.worker,
        car: this.car,
        items: [
          {
            item: this.itemName,
            price: this.itemPrice,
            quantity: this.itemQuantity,
          },
        ],
      };

      this.clients.push(newItem);

      this.name = "";
      this.surname = "";
      this.worker = "";
      this.car = "";
      this.itemName = "";
      this.itemPrice = "";
      this.itemQuantity = "";

      localStorage.setItem("clients", JSON.stringify(this.clients));
    },
    calculateTotalPrice(client) {
      let sum = 0;
      client.items.forEach((item) => {
        sum += item.quantity * item.price;
      });
      return sum;
    },
  },
};
</script>
