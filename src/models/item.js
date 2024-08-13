import { DataTypes } from "sequelize";
import { sequelize } from "../database/database.js";
import { Product } from "../models/product.js";

export const Item = sequelize.define("item", { 
    code_item: {
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
    price_unit: {
        type: DataTypes.DECIMAL
    },
    lote_number: {
        type: DataTypes.INTEGER
    },
    id_inv: {
        type: DataTypes.STRING,
        references: {
            model: Product,
            key: "code_inv"
        }
    }
});

Product.hasMany(Item, {
    foreignKey: "id_product",
    onDelete: "CASCADE",
    onUpdate: "CASCADE"
});

Item.belongsTo(Product, { foreignKey: "id_product" });