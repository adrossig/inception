FROM alpine:3.13

RUN apk update && apk upgrade -y
RUN mkdir -p /monitor/grafana
RUN wget -O /usr/bin/dumb-init https://github.com/Yelp/dumb-init/releases/download/v1.2.5/dumb-init_1.2.5_x86_64
RUN chmod +x /usr/bin/dumb-init
RUN curl -L https://dl.grafana.com/enterprise/release/grafana-enterprise-8.2.2.linux-amd64.tar.gz -o /tmp/grafana-enterprise-8.2.2.linux-amd64.tar.gz
RUN tar -zxvf /tmp/grafana-enterprise-8.2.2.linux-amd64.tar.gz -C /monitor/grafana && mv /monitor/grafana/grafana-8.2.2/* /monitor/grafana/
RUN rm -rf /monitor/grafana/grafana-8.2.2/
RUN mkdir -p /monitor/grafana/dashboards /monitor/grafana/conf/provisioning /monitor/grafana/conf/provisioning/datasources /monitor/grafana/conf/provisioning/dashboards

COPY conf/custom.ini /monitor/grafana/conf/custom.ini
COPY conf/datasource.yml /monitor/grafana/conf/provisioning/datasources/datasource.yml
COPY conf/dashboard.yml /monitor/grafana/conf/provisioning/dashboards/dashboard.yml
COPY conf/container.json /monitor/grafana/dashboards/container.json
COPY tools/config.sh /tmp/config.sh

RUN chmod +x /tmp/config.sh

WORKDIR /monitor/grafana

ENTRYPOINT [ "/usr/bin/dum-init", "--" ]

CMD [ "sh", "-c", "/tmp/config.sh" ]
