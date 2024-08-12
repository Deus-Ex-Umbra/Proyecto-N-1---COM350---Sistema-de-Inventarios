import { DataTypes } from "sequelize";
import { sequelize } from "../database/database.js";
import { User } from "../models/user.js";

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
    id_u: {
        type: DataTypes.INTEGER,
        refereces: {
            model: User,
            key: "id_user"
        }
    }
});

User.hasMany(Inventory, { 
    foreignKey: "id_u", 
    onDelete: "CASCADE", 
    onUpdate: "CASCADE"
});
Inventory.belongsTo(User, { foreignKey: "id_u"});