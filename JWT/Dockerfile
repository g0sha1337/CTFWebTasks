FROM python:3.11

WORKDIR /app
COPY requirements.txt .
RUN pip3 install -r requirements.txt

COPY static/ ./static
COPY templates/ ./templates
COPY main.py .

CMD ["python3", "main.py"]
