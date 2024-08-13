import express from 'express';
import morgan from 'morgan';
import { sequelize } from './database/database.js';
import inventoryRoutes from './routes/inventory.routes.js';
import productRoutes from './routes/product.routes.js';
import itemRoutes from './routes/item.routes.js';

const app = express();
app.use(morgan('dev'));
app.use(express.json());

app.use('/inventory', inventoryRoutes);
app.use('/product', productRoutes);
app.use('/item', itemRoutes);

const PORT = process.env.PORT || 3000;
app.get ('/', (req, res) => {
    res.send('Welcome to the Inventory Management API');
});

const startServer = async () => {
    try {
        await sequelize.authenticate();
        await sequelize.sync({ force: false });
        app.listen(PORT, () => {
            console.log(`Server running on port ${PORT}`);
        });
    } catch (error) {
        console.error('Unable to connect to the database:', error);
    }
};

startServer();
