import { DataTypes } from "sequelize";
import { sequelize } from "../database/database.js";
import { Inventory } from "../models/inventory.js";

export const Product = sequelize.define("product", {
    id_product: {
        type: DataTypes.STRING,
        primaryKey: true,
        unique: true
    },
    name: {
        type: DataTypes.STRING
    },
    description: {
        type: DataTypes.STRING
    },
    quantity: {
        type: DataTypes.INTEGER
    },
    total_price: {
        type: DataTypes.DECIMAL
    },
    price_unit: {
        type: DataTypes.DECIMAL
    },
    id_inv: {
        type: DataTypes.INTEGER,
        references: {
            model: Inventory,
            key: "code_inv"
        }
    }
});

Inventory.hasMany(Product, {
    foreignKey: "id_inv",
    onDelete: "CASCADE",
    onUpdate: "CASCADE"
});

Product.belongsTo(Inventory, { foreignKey: "id_inv" });