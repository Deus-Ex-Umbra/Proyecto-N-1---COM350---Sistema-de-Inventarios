import { DataTypes } from "sequelize";
import { sequelize } from "../database/database.js";

export const Inventory = sequelize.define("inventory", {
    code_inv: {
        type: DataTypes.INTEGER,
        primaryKey: true,
        autoIncrement: true,
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
});
