Run ``php worker.php`` - It'll be work with your tasks (you can run several workers) 

Run ``php new_task.php First message.``. You add task to Queue and send this to worker.

If you want to run several tasks and check how workers process several messages, you can run:

``.\task_runner.sh 6``

instead of 6 there can be any number. After that you will see:
 
     [x] Sent Message 1
     [x] Sent Message 2
     [x] Sent Message 3
     [x] Sent Message 4
     [x] Sent Message 5
     [x] Sent Message 6

RabbitMQ will send each message to the next consumer, in sequence.

If you want to check that we can be sure that even if you kill a worker using CTRL+C while it was processing a message, 
nothing will be lost, you can run:

``.\task_runner.sh 5 13``

Where 5 - amount of message, 13 - time of delay in seconds every message.
After the worker dies all unacknowledged messages will be redelivered. 