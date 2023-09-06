from typing import Final
from telegram import Update,  ReplyKeyboardMarkup, ReplyKeyboardRemove
from telegram.ext import Application, CommandHandler, ConversationHandler, MessageHandler, filters, ContextTypes
import mysql.connector

TOKEN: Final = '5983100808:AAEZqid9wn_qc2zkb5dFPtkHoVfBLIT0-Bg'
BOT_USERNAME: Final = '@ezakat_bot'

ROLE_SELECTION = 1
APPLICANT = 2
INTERVIEWER = 3

async def start_command(update: Update, context: ContextTypes.DEFAULT_TYPE):
    reply_keyboard = [['Applicant', 'Interviewer']]
    markup = ReplyKeyboardMarkup(reply_keyboard, one_time_keyboard=True)
    await update.message.reply_text('Welcome! Please choose your role:', reply_markup=markup)

    return ROLE_SELECTION

async def handle_role_selection(update: Update, context: ContextTypes.DEFAULT_TYPE):
    role = update.message.text.lower()

    if role == 'applicant':
        context.user_data['role'] = role
        await update.message.reply_text('Please enter your student matric number:')
        return APPLICANT
    elif role == 'interviewer':
        context.user_data['role'] = role
        await update.message.reply_text('Please enter your interviewer number:')
        return INTERVIEWER
    else:
        await update.message.reply_text('Invalid role. Please choose either "Applicant" or "Interviewer".')
        return ROLE_SELECTION

async def handle_applicant_response(update: Update, context: ContextTypes.DEFAULT_TYPE):
    student_id = update.message.text

    if student_id.isdigit():
        chat_id = update.message.chat_id
        update_query = "UPDATE applicant SET app_chatid = %s WHERE app_matric = %s"
        values = (chat_id, student_id)

        try:
            print('Updating into table...')
            cursor.execute(update_query, values)
            db.commit()

            if cursor.rowcount > 0:
                print('Update successful')
                await update.message.reply_text('Your chat ID has been stored in the database!')
            else:
                select_query = "SELECT * FROM applicant WHERE app_matric = %s"
                cursor.execute(select_query, (student_id,))
                result = cursor.fetchone()

                if result is not None:
                    print('Chat ID already stored')
                    await update.message.reply_text('Your chat ID is already stored in the database.')
                else:
                    print('Number does not exist')
                    await update.message.reply_text('Student number does not exist in the database. Please Register e-ZAKAT.')

        except mysql.connector.Error as error:
            print(f'Error updating database: {error}')
            db.rollback()
            await update.message.reply_text('An error occurred while updating the database.')
    else:
        print('Number is not digit')
        await update.message.reply_text('Invalid student number. Please enter a numeric value.')

    return ConversationHandler.END

async def handle_interviewer_response(update: Update, context: ContextTypes.DEFAULT_TYPE):
    interviewer_id = update.message.text

    if interviewer_id.isdigit():
        chat_id = update.message.chat_id
        update_query = "UPDATE interviewer SET inter_chatid = %s WHERE inter_no_pekerja = %s"
        values = (chat_id, interviewer_id)

        try:
            print('Updating into table...')
            cursor.execute(update_query, values)
            db.commit()

            if cursor.rowcount > 0:
                print('Update successful')
                await update.message.reply_text('Your chat ID has been stored in the database!')
            else:
                select_query = "SELECT * FROM interviewer WHERE inter_no_pekerja = %s"
                cursor.execute(select_query, (interviewer_id,))
                result = cursor.fetchone()

                if result is not None:
                    print('Chat ID already stored')
                    await update.message.reply_text('Your chat ID is already stored in the database.')
                else:
                    print('Number does not exist')
                    await update.message.reply_text('Interviewer number does not exist in the database. Please Register e-ZAKAT.')

        except mysql.connector.Error as error:
            print(f'Error updating database: {error}')
            db.rollback()
            await update.message.reply_text('An error occurred while updating the database.')
    else:
        print('Number is not digit')
        await update.message.reply_text('Invalid interviewer number. Please enter a numeric value.')

    return ConversationHandler.END

async def error(update: Update, context: ContextTypes.DEFAULT_TYPE):
    print(f'Update {update} caused error {context.error}')


if __name__ == '__main__':
    print('Starting bot...')

    try:
        # Connect to MySQL database
        db = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="zakat"
        )
        cursor = db.cursor()
        print('Database connection established.')
    except mysql.connector.Error as error:
        print(f'Error connecting to the database: {error}')
        
    app = Application.builder().token(TOKEN).build()

    conv_handler = ConversationHandler(
        entry_points=[CommandHandler('start', start_command)],
        states={
            ROLE_SELECTION: [MessageHandler(filters.TEXT & ~filters.COMMAND, handle_role_selection)],
            APPLICANT: [MessageHandler(filters.TEXT & ~filters.COMMAND, handle_applicant_response)],
            INTERVIEWER: [MessageHandler(filters.TEXT & ~filters.COMMAND, handle_interviewer_response)],
        },
        fallbacks=[],
    )

    app.add_handler(conv_handler)
    app.add_error_handler(error)

    print('Polling...')
    app.run_polling(poll_interval=5)
