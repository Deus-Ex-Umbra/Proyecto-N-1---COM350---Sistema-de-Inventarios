import { sequelize } from "../database/database.js";
import { Item } from "../models/item.js";

export const createItem = async (data) => {
    const transaction = await sequelize.transaction();
    try {
        const item_data = {
            name: data.name,
            description: data.description,
            price_unit: data.price_unit,
            lote_number: data.lote_number,
            id_inv: data.id_inv
        };
        const data = await Item.create(item_data, { transaction });
        await transaction.commit();
        return data;
    } catch (error) {
        await transaction.rollback();
        throw error;
    }
};

export const updateItem = async (id, data) => {
    const transaction = await sequelize.transaction();
    try {
        const item_data = {
            name: data.name,
            description: data.description,
            price_unit: data.price_unit,
            lote_number: data.lote_number,
            id_inv: data.id_inv
        };
        const data = await Item.update(item_data, { where: { code_item: id } }, { transaction });
        await transaction.commit();
        return data;
    } catch (error) {
        await transaction.rollback();
        throw error;
    }
};

export const deleteItem = async (id) => {
    const transaction = await sequelize.transaction();
    try {
        const data = await Item.destroy({ where: { code_item: id } }, { transaction });
        await transaction.commit();
        return data;
    } catch (error) {
        await transaction.rollback();
        throw error;
    }
};

export const getAllItems = async () => {
    try {
        const data = await Item.findAll();
        return data;
    } catch (error) {
        throw error;
    }
};

export const getItemById = async (id) => {
    try {
        const data = await Item.findByPk(id);
        return data;
    } catch (error) {
        throw error;
    }
};