import { DataTypes } from "sequelize";
import { sequelize } from "../database/database.js";
import { Inventory } from "../models/inventory.js";

export const createInventory = async (data) => {
    const transaction = await sequelize.transaction();
    try {
        const inventory_data = {
            name: data.name,
            description: data.description,
            quantity: data.quantity,
            total_price: data.total_price,
            id_u: data.id_u
        };
        const data = await Inventory.create(inventory_data, { transaction });
        await transaction.commit();
        return data;
    } catch (error) {
        await transaction.rollback();
        throw error;
    }
};

export const updateInventory = async (id, data) => {
    const transaction = await sequelize.transaction();
    try {
        const inventory_data = {
            name: data.name,
            description: data.description,
            quantity: data.quantity,
            total_price: data.total_price,
            id_u: data.id_u
        };
        const data = await Inventory.update(inventory_data, { where: { code_inv: id } }, { transaction });
        await transaction.commit();
        return data;
    } catch (error) {
        await transaction.rollback();
        throw error;
    }
};

export const deleteInventory = async (id) => {
    const transaction = await sequelize.transaction();
    try {
        const data = await Inventory.destroy({ where: { code_inv: id } }, { transaction });
        await transaction.commit();
        return data;
    } catch (error) {
        await transaction.rollback();
        throw error;
    }
};

export const getAllInventories = async () => {
    try {
        const data = await Inventory.findAll();
        return data;
    } catch (error) {
        throw error;
    }
};

export const getInventoryById = async (id) => {
    try {
        const data = await Inventory.findByPk(id);
        return data;
    } catch (error) {
        throw error;
    }
};