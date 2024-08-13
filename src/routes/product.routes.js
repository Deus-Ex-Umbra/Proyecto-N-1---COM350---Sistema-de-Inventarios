import * as productController from '../controllers/product.controller.js';
import expres from 'express';

const router = expres.Router();

router.post('/products', productController.createProduct);
router.put('/products/:id', productController.updateProduct);
router.delete('/products/:id', productController.deleteProduct);
router.get('/products', productController.getAllProducts);
router.get('/products/:id', productController.getProductById);
router.get('/products/inventory/:id', productController.getProductByInventoryId);

export default router;