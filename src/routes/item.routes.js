import * as itemController from '../controllers/item.controller';
import expres from 'express';

const router = expres.Router();

router.post('/items', itemController.createItem);
router.put('/items/:id', itemController.updateItem);
router.delete('/items/:id', itemController.deleteItem);
router.get('/items', itemController.getAllItems);
router.get('/items/:id', itemController.getItemById);

export default router;