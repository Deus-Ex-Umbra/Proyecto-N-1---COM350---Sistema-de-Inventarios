import * as inventoryController from '../controllers/inventory.controller';
import expres from 'express';

const router = expres.Router();

router.post('/inventories', inventoryController.createInventory);
router.put('/inventories/:id', inventoryController.updateInventory);
router.delete('/inventories/:id', inventoryController.deleteInventory);
router.get('/inventories', inventoryController.getAllInventories);
router.get('/inventories/:id', inventoryController.getInventoryById);

export default router;