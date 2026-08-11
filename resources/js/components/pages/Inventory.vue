<template>
    <div>
        <v-container fluid>

            <v-toolbar color="#FF80C7">
                <v-toolbar-title class="mt-2">
                    KBS Inventory
                </v-toolbar-title>

                <v-spacer></v-spacer>

                <v-btn  variant="elevated" @click="openAddProduct">
                    Add Product
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
            </v-toolbar>

            <v-row>

                <v-col
                    v-for="product in products"
                    :key="product.id"
                    cols="5"
                    sm="6"
                    md="4"
                    lg="3"
                    xl="2"
                >

   <v-card width="220" class="mt-4 ml-3 rounded-lg" elevation="2">
  <!-- Product Image with Floating Edit Button -->
  <v-img :src="product.image" height="160" cover class="align-start justify-end p-2">
    <v-btn
      icon
      size="x-small"
      color="white"
      class="ma-1"
      @click="editProduct(product)"
      elevation="2"
    >
      <v-icon size="16" color="pink">mdi-pencil</v-icon>
    </v-btn>
  </v-img>

  <!-- Product Details -->
  <v-card-text class="pa-3">
    <!-- Title -->
    <div class="text-subtitle-2 font-weight-bold text-truncate mb-1">
      {{ product.name }}
    </div>

    <!-- Quantity -->
    <div class="text-caption text-medium-emphasis mb-2">
      Qty: <span class="font-weight-medium text-high-emphasis">{{ product.quantity }}</span>
    </div>

    <!-- Main Price -->
    <div class="text-subtitle-1 font-weight-bold text-primary mb-2">
      ₱{{ product.price }}
    </div>

    <v-divider class="my-2"></v-divider>

    <!-- Platform Prices (Compact List) -->
    <div class="d-flex justify-space-between text-caption text-medium-emphasis mb-1">
      <span>Tiktok:</span>
      <span class="font-weight-medium text-high-emphasis">₱{{ product.tiktok_price }}</span>
    </div>
    <div class="d-flex justify-space-between text-caption text-medium-emphasis">
      <span>Shopee:</span>
      <span class="font-weight-medium text-high-emphasis">₱{{ product.shopee_price }}</span>
    </div>
  </v-card-text>
</v-card>

                </v-col>

            </v-row>
            <v-dialog v-model="dialog" max-width ='500'>
                <v-card>
                    <v-card-title class="mt-4 " style="background-color:pink; color:white" >
                        <span class="text-h5">Add Product</span>
                    </v-card-title>
                    
                    <>
                        <v-text-field
                        v-model="newProduct.image"
                        label="img Url"
                        />

                        <v-text-field 
                        v-model="newProduct.name" 
                        label ='Product Name' />
                        
                        <v-text-field
                        v-model="newProduct.quantity"  
                        label="Product Quantity" 
                        type="number"
                        />

                        <v-text-field
                        v-model="newProduct.tiktok_price"
                        label="Tiktok Price"
                        type="number"
                        />

                        <v-text-field
                        v-model="newProduct.shopee_price"
                        label="Shopee Price"
                        type="number"
                        />

                        <v-text-field
                        v-model="newProduct.price"
                        label="Product Price" 
                        type="number"
                        />
                      
                    <v-card-actions>

                        <v-btn @click="dialog = false">
                            Cancel
                        </v-btn>

                        <v-btn
                        color-="pink" 
                        @click="addProducts"
                        >
                            {{ this.title === 'Add' ? 'Add':'Update' }}
                        </v-btn>
                    </v-card-actions>
                 
                </v-card>
            </v-dialog>
        </v-container>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            products: [],
            dialog:false,
            title:'',
            newProduct:{
                image:'',
                name:'',
                quantity:0,
                price:0,
                tiktok_price:0,
                shopee_price:0

            }
        };
    },

    mounted() {
        this.getProducts();
    },

    methods: {
        async getProducts() {
            try {
                const response = await axios.get(
                    'http://127.0.0.1:8000/api/kookuproducts'
                );

                console.log(response.data);

                this.products = response.data;

            } catch (error) {
                console.error(error);
            }
        },
async addProducts() {
    try {
        let response;

        if (this.title === 'Add') {

            response = await axios.post(
                'http://127.0.0.1:8000/api/kookuproducts',
                this.newProduct
            );

            alert('Product Added Successfully');

        } else {

            response = await axios.put(
                `http://127.0.0.1:8000/api/kookuproducts/${this.newProduct.id}`,
                this.newProduct
            );

            alert('Product Updated Successfully');
        }

        console.log('SERVER RESPONSE:', response.data);

        // Kunin ulit mismo sa database
        await this.getProducts();

        this.dialog = false;


    } catch (error) {
       
    console.error('ERROR:', error);
    console.error('STATUS:', error.response?.status);
    console.error('DATA:', error.response?.data);
}
    
    },
    async openAddProduct(){
        this.title = 'Add'
        
        this.newProduct = {
            image: '',
            name: '',
            quantity: 0,
            price: 0,
            tiktok_price: 0,
            shopee_price: 0
        };
        this.dialog = true

    },

        async editProduct(product){
            this.title = 'Edit'
            this.newProduct = {...product};
            this.dialog = true
        }
    }
};
</script>

