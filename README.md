Original task: https://github.com/NordLocker/php-candidate-task/

### Install

1. Build application image

```bash
make build
```

2. Install Dependencies

```bash
make install
```

3. Provide environment variables. You can copy default ones

```bash
cp env.example .env
```

After you can use 

```bash
make up
```
to start application and 

```bash
make down
```
to stop application

### Usage

Provide city as value

```bash
make run city=YOUR_CITY
```

### Run tests

```bash
make run-tests
```
